<?php

namespace AlexanderC\Bundle\UngaBungaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AlexanderC\Bundle\UngaBungaBundle\Entity\PromoCode;
use AlexanderC\Bundle\UngaBungaBundle\Form\PromoCodeType;

/**
 * PromoCode controller.
 *
 */
class PromoCodeController extends Controller
{

    /**
     * Lists all PromoCode entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('UngaBungaBundle:PromoCode')->findAll();

        return $this->render('UngaBungaBundle:PromoCode:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new PromoCode entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new PromoCode();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('promocode_show', array('id' => $entity->getId())));
        }

        return $this->render('UngaBungaBundle:PromoCode:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a PromoCode entity.
    *
    * @param PromoCode $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(PromoCode $entity)
    {
        $form = $this->createForm(new PromoCodeType(), $entity, array(
            'action' => $this->generateUrl('promocode_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Добавить'));

        return $form;
    }

    /**
     * Displays a form to create a new PromoCode entity.
     *
     */
    public function newAction()
    {
        $entity = new PromoCode();
        $form   = $this->createCreateForm($entity);

        return $this->render('UngaBungaBundle:PromoCode:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a PromoCode entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UngaBungaBundle:PromoCode')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PromoCode entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UngaBungaBundle:PromoCode:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing PromoCode entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UngaBungaBundle:PromoCode')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PromoCode entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UngaBungaBundle:PromoCode:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a PromoCode entity.
    *
    * @param PromoCode $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(PromoCode $entity)
    {
        $form = $this->createForm(new PromoCodeType(), $entity, array(
            'action' => $this->generateUrl('promocode_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Обновить'));

        return $form;
    }
    /**
     * Edits an existing PromoCode entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UngaBungaBundle:PromoCode')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PromoCode entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('promocode_edit', array('id' => $id)));
        }

        return $this->render('UngaBungaBundle:PromoCode:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a PromoCode entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('UngaBungaBundle:PromoCode')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find PromoCode entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('promocode'));
    }

    /**
     * Creates a form to delete a PromoCode entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('promocode_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Удалить'))
            ->getForm()
        ;
    }
}
