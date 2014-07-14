<?php

namespace AlexanderC\Bundle\UngaBungaBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AlexanderC\Bundle\UngaBungaBundle\Entity\Customer;

/**
 * Customer controller.
 *
 */
class CustomerController extends Controller
{

    /**
     * Lists all Customer entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('UngaBungaBundle:Customer')->findAll();

        return $this->render('UngaBungaBundle:Customer:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Customer entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UngaBungaBundle:Customer')->find($id);

        $activeApplicationsCount = $em->getRepository('UngaBungaBundle:Customer')
            ->countActiveApplications($entity);
        $closedApplicationsCount = $em->getRepository('UngaBungaBundle:Customer')
            ->countClosedApplications($entity);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Customer entity.');
        }

        return $this->render('UngaBungaBundle:Customer:show.html.twig', array(
            'entity'      => $entity,
            'activeApplicationsCount' => $activeApplicationsCount,
            'closedApplicationsCount' => $closedApplicationsCount
        ));
    }
}
