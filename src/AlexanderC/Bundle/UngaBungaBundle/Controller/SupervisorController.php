<?php

namespace AlexanderC\Bundle\UngaBungaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AlexanderC\Bundle\UngaBungaBundle\Entity\Supervisor;
use AlexanderC\Bundle\UngaBungaBundle\Form\SupervisorType;
use Symfony\Component\HttpFoundation\Response;

/**
 * Supervisor controller.
 *
 */
class SupervisorController extends Controller
{

    /**
     * Lists all Supervisor entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('UngaBungaBundle:Supervisor')->findAll();

        return $this->render('UngaBungaBundle:Supervisor:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Supervisor entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Supervisor();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('supervisor_show', array('id' => $entity->getId())));
        }

        return $this->render('UngaBungaBundle:Supervisor:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Supervisor entity.
    *
    * @param Supervisor $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Supervisor $entity)
    {
        $form = $this->createForm(new SupervisorType(), $entity, array(
            'action' => $this->generateUrl('supervisor_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Добавить'));

        return $form;
    }

    /**
     * Displays a form to create a new Supervisor entity.
     *
     */
    public function newAction()
    {
        $entity = new Supervisor();
        $form   = $this->createCreateForm($entity);

        return $this->render('UngaBungaBundle:Supervisor:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Supervisor entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UngaBungaBundle:Supervisor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Supervisor entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UngaBungaBundle:Supervisor:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Supervisor entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UngaBungaBundle:Supervisor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Supervisor entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UngaBungaBundle:Supervisor:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Supervisor entity.
    *
    * @param Supervisor $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Supervisor $entity)
    {
        $form = $this->createForm(new SupervisorType(), $entity, array(
            'action' => $this->generateUrl('supervisor_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Обновить'));

        return $form;
    }
    /**
     * Edits an existing Supervisor entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UngaBungaBundle:Supervisor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Supervisor entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('supervisor_edit', array('id' => $id)));
        }

        return $this->render('UngaBungaBundle:Supervisor:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Supervisor entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('UngaBungaBundle:Supervisor')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Supervisor entity.');
            }

            if(!$em->getRepository('UngaBungaBundle:Supervisor')->safeRemove($entity)) {
                return new Response(
                    "Вы не можете удалить единственного супервайзера если есть 'завязанные' операторы."
                );
            }
            //$em->remove($entity);
            //$em->flush();
        }

        return $this->redirect($this->generateUrl('supervisor'));
    }

    /**
     * Creates a form to delete a Supervisor entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('supervisor_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Удалить'))
            ->getForm()
        ;
    }
}
