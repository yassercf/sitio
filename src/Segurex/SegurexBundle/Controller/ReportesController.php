<?php

namespace Segurex\SegurexBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Segurex\SegurexBundle\Entity\Reportes;
use Segurex\SegurexBundle\Form\ReportesType;

/**
 * Reportes controller.
 *
 */
class ReportesController extends Controller
{

    /**
     * Lists all Reportes entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SegurexBundle:Reportes')->findAll();

        return $this->render('SegurexBundle:Reportes:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Reportes entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Reportes();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('reportes_show', array('id' => $entity->getId())));
        }

        return $this->render('SegurexBundle:Reportes:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Reportes entity.
     *
     * @param Reportes $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Reportes $entity)
    {
        $form = $this->createForm(new ReportesType(), $entity, array(
            'action' => $this->generateUrl('reportes_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Reportes entity.
     *
     */
    public function newAction()
    {
        $entity = new Reportes();
        $form   = $this->createCreateForm($entity);

        return $this->render('SegurexBundle:Reportes:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Reportes entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SegurexBundle:Reportes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Reportes entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SegurexBundle:Reportes:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Reportes entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SegurexBundle:Reportes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Reportes entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SegurexBundle:Reportes:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Reportes entity.
    *
    * @param Reportes $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Reportes $entity)
    {
        $form = $this->createForm(new ReportesType(), $entity, array(
            'action' => $this->generateUrl('reportes_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Reportes entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SegurexBundle:Reportes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Reportes entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('reportes_edit', array('id' => $id)));
        }

        return $this->render('SegurexBundle:Reportes:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Reportes entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SegurexBundle:Reportes')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Reportes entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('reportes'));
    }

    /**
     * Creates a form to delete a Reportes entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('reportes_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}