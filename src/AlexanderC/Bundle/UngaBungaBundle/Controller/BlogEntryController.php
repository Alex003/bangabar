<?php

namespace AlexanderC\Bundle\UngaBungaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AlexanderC\Bundle\UngaBungaBundle\Entity\BlogEntry;
use AlexanderC\Bundle\UngaBungaBundle\Form\BlogEntryType;

/**
 * BlogEntry controller.
 *
 */
class BlogEntryController extends Controller
{

    /**
     * Lists all BlogEntry entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('UngaBungaBundle:BlogEntry')->findAll();

        return $this->render('UngaBungaBundle:BlogEntry:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new BlogEntry entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new BlogEntry();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('blogentry_show', array('id' => $entity->getId())));
        }

        return $this->render('UngaBungaBundle:BlogEntry:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a BlogEntry entity.
    *
    * @param BlogEntry $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(BlogEntry $entity)
    {
        $form = $this->createForm(new BlogEntryType(), $entity, array(
            'action' => $this->generateUrl('blogentry_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Добавить'));

        return $form;
    }

    /**
     * Displays a form to create a new BlogEntry entity.
     *
     */
    public function newAction()
    {
        $entity = new BlogEntry();
        $form   = $this->createCreateForm($entity);

        return $this->render('UngaBungaBundle:BlogEntry:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a BlogEntry entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UngaBungaBundle:BlogEntry')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlogEntry entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UngaBungaBundle:BlogEntry:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing BlogEntry entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UngaBungaBundle:BlogEntry')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlogEntry entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UngaBungaBundle:BlogEntry:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a BlogEntry entity.
    *
    * @param BlogEntry $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(BlogEntry $entity)
    {
        $form = $this->createForm(new BlogEntryType(), $entity, array(
            'action' => $this->generateUrl('blogentry_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Обновить'));

        return $form;
    }
    /**
     * Edits an existing BlogEntry entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UngaBungaBundle:BlogEntry')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlogEntry entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('blogentry_edit', array('id' => $id)));
        }

        return $this->render('UngaBungaBundle:BlogEntry:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a BlogEntry entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('UngaBungaBundle:BlogEntry')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BlogEntry entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('blogentry'));
    }

    /**
     * Creates a form to delete a BlogEntry entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('blogentry_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Удалить'))
            ->getForm()
        ;
    }
}
