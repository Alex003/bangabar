<?php

namespace AlexanderC\Bundle\UngaBungaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AlexanderC\Bundle\UngaBungaBundle\Entity\BlogCategory;
use AlexanderC\Bundle\UngaBungaBundle\Form\BlogCategoryType;

/**
 * BlogCategory controller.
 *
 */
class BlogCategoryController extends Controller
{

    /**
     * Lists all BlogCategory entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('UngaBungaBundle:BlogCategory')->findAll();

        return $this->render('UngaBungaBundle:BlogCategory:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new BlogCategory entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new BlogCategory();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('blogcategory_show', array('id' => $entity->getId())));
        }

        return $this->render('UngaBungaBundle:BlogCategory:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a BlogCategory entity.
    *
    * @param BlogCategory $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(BlogCategory $entity)
    {
        $form = $this->createForm(new BlogCategoryType(), $entity, array(
            'action' => $this->generateUrl('blogcategory_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Добавить'));

        return $form;
    }

    /**
     * Displays a form to create a new BlogCategory entity.
     *
     */
    public function newAction()
    {
        $entity = new BlogCategory();
        $form   = $this->createCreateForm($entity);

        return $this->render('UngaBungaBundle:BlogCategory:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a BlogCategory entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UngaBungaBundle:BlogCategory')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlogCategory entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UngaBungaBundle:BlogCategory:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing BlogCategory entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UngaBungaBundle:BlogCategory')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlogCategory entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UngaBungaBundle:BlogCategory:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a BlogCategory entity.
    *
    * @param BlogCategory $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(BlogCategory $entity)
    {
        $form = $this->createForm(new BlogCategoryType(), $entity, array(
            'action' => $this->generateUrl('blogcategory_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Обновить'));

        return $form;
    }
    /**
     * Edits an existing BlogCategory entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UngaBungaBundle:BlogCategory')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlogCategory entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('blogcategory_edit', array('id' => $id)));
        }

        return $this->render('UngaBungaBundle:BlogCategory:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a BlogCategory entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('UngaBungaBundle:BlogCategory')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BlogCategory entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('blogcategory'));
    }

    /**
     * Creates a form to delete a BlogCategory entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('blogcategory_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Удалить'))
            ->getForm()
        ;
    }
}
