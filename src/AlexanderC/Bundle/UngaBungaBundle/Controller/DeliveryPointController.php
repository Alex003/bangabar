<?php

namespace AlexanderC\Bundle\UngaBungaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AlexanderC\Bundle\UngaBungaBundle\Entity\DeliveryPoint;
use AlexanderC\Bundle\UngaBungaBundle\Form\DeliveryPointType;

/**
 * DeliveryPoint controller.
 *
 */
class DeliveryPointController extends Controller
{

    /**
     * Lists all DeliveryPoint entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('UngaBungaBundle:DeliveryPoint')->findAll();

        return $this->render('UngaBungaBundle:DeliveryPoint:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new DeliveryPoint entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new DeliveryPoint();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('deliverypoint_show', array('id' => $entity->getId())));
        }

        return $this->render('UngaBungaBundle:DeliveryPoint:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a DeliveryPoint entity.
    *
    * @param DeliveryPoint $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(DeliveryPoint $entity)
    {
        $form = $this->createForm(new DeliveryPointType(), $entity, array(
            'action' => $this->generateUrl('deliverypoint_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Добавить'));

        return $form;
    }

    /**
     * Displays a form to create a new DeliveryPoint entity.
     *
     */
    public function newAction()
    {
        $entity = new DeliveryPoint();
        $form   = $this->createCreateForm($entity);

        return $this->render('UngaBungaBundle:DeliveryPoint:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a DeliveryPoint entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UngaBungaBundle:DeliveryPoint')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DeliveryPoint entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UngaBungaBundle:DeliveryPoint:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing DeliveryPoint entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UngaBungaBundle:DeliveryPoint')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DeliveryPoint entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UngaBungaBundle:DeliveryPoint:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a DeliveryPoint entity.
    *
    * @param DeliveryPoint $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(DeliveryPoint $entity)
    {
        $form = $this->createForm(new DeliveryPointType(), $entity, array(
            'action' => $this->generateUrl('deliverypoint_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Обновить'));

        return $form;
    }
    /**
     * Edits an existing DeliveryPoint entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UngaBungaBundle:DeliveryPoint')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DeliveryPoint entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('deliverypoint_edit', array('id' => $id)));
        }

        return $this->render('UngaBungaBundle:DeliveryPoint:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a DeliveryPoint entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('UngaBungaBundle:DeliveryPoint')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find DeliveryPoint entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('deliverypoint'));
    }

    /**
     * Creates a form to delete a DeliveryPoint entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('deliverypoint_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Удалить'))
            ->getForm()
        ;
    }
}
