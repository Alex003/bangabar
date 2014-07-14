<?php
/**
 * @author AlexanderC <self@alexanderc.me>
 * @date 2/25/14
 * @time 12:32 AM
 */

namespace AlexanderC\Bundle\UngaBungaBundle\Controller;


use AlexanderC\Bundle\UngaBungaBundle\Form\SettingsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class DashboardController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function uploadAttachmentAction(Request $request)
    {
        if($request->getMethod() == "POST") {
            /** @var UploadedFile $uploadedFile */
            foreach($request->files as $uploadedFile) {
                $uploadPath = sprintf("%s/../web/uploads/", $this->get('kernel')->getRootDir());

                $name = sprintf(
                    "%s-%s-%s",
                    microtime(true),
                    uniqid(null, true),
                    $uploadedFile->getClientOriginalName()
                );

                try {
                    $file = $uploadedFile->move($uploadPath, $name);
                } catch(\Exception $e) {
                    return new JsonResponse(array('code' => 1, 'error' => $e->getMessage()));
                }

                // return only for first file uploaded.
                return new JsonResponse(array(
                                            'code' => 0,
                                            'file' => sprintf(
                                                "%s/uploads/%s",
                                                $request->getSchemeAndHttpHost(),
                                                $name
                                            )
                                        ));
            }

            return new JsonResponse(array('code' => 1, 'error' => 'Нечего загружать...'));
        }

        return new JsonResponse(array('code' => 1, 'error' => 'Only POST request allowed'));
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $operatorsCount = $em->getRepository('UngaBungaBundle:Operator')->countAll();
        $activeOperatorsCount = $em->getRepository('UngaBungaBundle:Operator')->countAll();

        $applicationsCount = $em->getRepository('UngaBungaBundle:Application')->countAll();
        $activeApplicationsCount = $em->getRepository('UngaBungaBundle:Application')->countActive();
        $closedApplicationsCount = $em->getRepository('UngaBungaBundle:Application')->countClosed();

        return $this->render('UngaBungaBundle:Dashboard:index.html.twig', array(
             'operatorsCount' => $operatorsCount,
             'activeOperatorsCount' => $activeOperatorsCount,
             'applicationsCount' => $applicationsCount,
             'activeApplicationsCount' => $activeApplicationsCount,
             'closedApplicationsCount' => $closedApplicationsCount
        ));
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function settingsAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $settings = $em->getRepository("UngaBungaBundle:Settings")->findFirst();
        $form = $this->createForm(new SettingsType(), $settings, array(
                                                            'method' => 'POST',
                                                        ));

        $form->add('submit', 'submit', array('label' => 'Сохранить'));
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settings);
            $em->flush();
        }

        return $this->render('UngaBungaBundle:Dashboard:settings.html.twig', array(
            'settings' => $settings,
            'form' => $form->createView()
        ));
    }
} 