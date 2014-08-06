<?php

namespace AlexanderC\Bundle\UngaBungaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AlexanderC\Bundle\UngaBungaBundle\Entity\ShopEntry;
use AlexanderC\Bundle\UngaBungaBundle\Form\ShopEntryType;

/**
 * ShopEntry controller.
 *
 */
class ShopEntryController extends Controller
{

    /**
     * Lists all ShopEntry entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('UngaBungaBundle:ShopEntry')->findAll();

        return $this->render('UngaBungaBundle:ShopEntry:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new ShopEntry entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new ShopEntry();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('shopentry_show', array('id' => $entity->getId())));
        }

        return $this->render('UngaBungaBundle:ShopEntry:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a ShopEntry entity.
    *
    * @param ShopEntry $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(ShopEntry $entity)
    {
        $form = $this->createForm(new ShopEntryType(), $entity, array(
            'action' => $this->generateUrl('shopentry_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Добавить'));

        return $form;
    }

    /**
     * Displays a form to create a new ShopEntry entity.
     *
     */
    public function newAction()
    {
        $entity = new ShopEntry();
        $form   = $this->createCreateForm($entity);

        return $this->render('UngaBungaBundle:ShopEntry:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ShopEntry entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UngaBungaBundle:ShopEntry')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ShopEntry entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UngaBungaBundle:ShopEntry:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing ShopEntry entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UngaBungaBundle:ShopEntry')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ShopEntry entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UngaBungaBundle:ShopEntry:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a ShopEntry entity.
    *
    * @param ShopEntry $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(ShopEntry $entity)
    {
        $form = $this->createForm(new ShopEntryType(), $entity, array(
            'action' => $this->generateUrl('shopentry_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Обновить'));

        return $form;
    }
    /**
     * Edits an existing ShopEntry entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UngaBungaBundle:ShopEntry')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ShopEntry entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {

            $em->flush();

            return $this->redirect($this->generateUrl('shopentry_edit', array('id' => $id)));
        }

        return $this->render('UngaBungaBundle:ShopEntry:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a ShopEntry entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('UngaBungaBundle:ShopEntry')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ShopEntry entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('shopentry'));
    }

    /**
     * Creates a form to delete a ShopEntry entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('shopentry_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Удалить'))
            ->getForm()
        ;
    }
}
