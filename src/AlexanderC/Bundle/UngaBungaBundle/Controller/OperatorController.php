<?php

namespace AlexanderC\Bundle\UngaBungaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AlexanderC\Bundle\UngaBungaBundle\Entity\Operator;
use AlexanderC\Bundle\UngaBungaBundle\Form\OperatorType;

/**
 * Operator controller.
 *
 */
class OperatorController extends Controller
{

    /**
     * Lists all Operator entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('UngaBungaBundle:Operator')->findAll();

        return $this->render('UngaBungaBundle:Operator:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Operator entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Operator();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('operator_show', array('id' => $entity->getId())));
        }

        return $this->render('UngaBungaBundle:Operator:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Operator entity.
    *
    * @param Operator $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Operator $entity)
    {
        $form = $this->createForm(new OperatorType(), $entity, array(
            'action' => $this->generateUrl('operator_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Добавить'));

        return $form;
    }

    /**
     * Displays a form to create a new Operator entity.
     *
     */
    public function newAction()
    {
        $entity = new Operator();
        $form   = $this->createCreateForm($entity);

        return $this->render('UngaBungaBundle:Operator:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Operator entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UngaBungaBundle:Operator')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Operator entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UngaBungaBundle:Operator:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Operator entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UngaBungaBundle:Operator')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Operator entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UngaBungaBundle:Operator:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Operator entity.
    *
    * @param Operator $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Operator $entity)
    {
        $form = $this->createForm(new OperatorType(), $entity, array(
            'action' => $this->generateUrl('operator_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Обновить'));

        return $form;
    }
    /**
     * Edits an existing Operator entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UngaBungaBundle:Operator')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Operator entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('operator_edit', array('id' => $id)));
        }

        return $this->render('UngaBungaBundle:Operator:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Operator entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('UngaBungaBundle:Operator')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Operator entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('operator'));
    }

    /**
     * Creates a form to delete a Operator entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('operator_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Удалить'))
            ->getForm()
        ;
    }
}
