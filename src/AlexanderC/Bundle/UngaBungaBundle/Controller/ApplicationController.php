<?php

namespace AlexanderC\Bundle\UngaBungaBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AlexanderC\Bundle\UngaBungaBundle\Entity\Application;

/**
 * Application controller.
 *
 */
class ApplicationController extends Controller
{

    /**
     * Lists all Application entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('UngaBungaBundle:Application')->findAll();

        return $this->render('UngaBungaBundle:Application:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Application entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UngaBungaBundle:Application')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Application entity.');
        }

        return $this->render('UngaBungaBundle:Application:show.html.twig', array(
            'entity'      => $entity,
        ));
    }
}
