<?php

namespace AlexanderC\Bundle\UngaBungaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AlexanderC\Bundle\UngaBungaBundle\Entity\ApplicationReplySubject;
use AlexanderC\Bundle\UngaBungaBundle\Form\ApplicationReplySubjectType;

/**
 * ApplicationReplySubject controller.
 *
 */
class ApplicationReplySubjectController extends Controller
{

    /**
     * Lists all ApplicationReplySubject entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('UngaBungaBundle:ApplicationReplySubject')->findAll();

        return $this->render('UngaBungaBundle:ApplicationReplySubject:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new ApplicationReplySubject entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new ApplicationReplySubject();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('applicationreplysubject_show', array('id' => $entity->getId())));
        }

        return $this->render('UngaBungaBundle:ApplicationReplySubject:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a ApplicationReplySubject entity.
    *
    * @param ApplicationReplySubject $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(ApplicationReplySubject $entity)
    {
        $form = $this->createForm(new ApplicationReplySubjectType(), $entity, array(
            'action' => $this->generateUrl('applicationreplysubject_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Добавить'));

        return $form;
    }

    /**
     * Displays a form to create a new ApplicationReplySubject entity.
     *
     */
    public function newAction()
    {
        $entity = new ApplicationReplySubject();
        $form   = $this->createCreateForm($entity);

        return $this->render('UngaBungaBundle:ApplicationReplySubject:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ApplicationReplySubject entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UngaBungaBundle:ApplicationReplySubject')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ApplicationReplySubject entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UngaBungaBundle:ApplicationReplySubject:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing ApplicationReplySubject entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UngaBungaBundle:ApplicationReplySubject')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ApplicationReplySubject entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UngaBungaBundle:ApplicationReplySubject:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a ApplicationReplySubject entity.
    *
    * @param ApplicationReplySubject $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(ApplicationReplySubject $entity)
    {
        $form = $this->createForm(new ApplicationReplySubjectType(), $entity, array(
            'action' => $this->generateUrl('applicationreplysubject_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Обновить'));

        return $form;
    }
    /**
     * Edits an existing ApplicationReplySubject entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UngaBungaBundle:ApplicationReplySubject')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ApplicationReplySubject entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('applicationreplysubject_edit', array('id' => $id)));
        }

        return $this->render('UngaBungaBundle:ApplicationReplySubject:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a ApplicationReplySubject entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('UngaBungaBundle:ApplicationReplySubject')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ApplicationReplySubject entity.');
            }

            $applicationReplys = $em->getRepository('UngaBungaBundle:ApplicationReply')->findBy(array('subject'=> $entity->getId()));
            if($applicationReplys)
            {
                foreach($applicationReplys as $applicationReply)
                {
                    $applicationReply->setSubject(null);
                    $em->persist($applicationReply);
                }
                $em->flush();
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('applicationreplysubject'));
    }

    /**
     * Creates a form to delete a ApplicationReplySubject entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('applicationreplysubject_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Удалить'))
            ->getForm()
        ;
    }
}
