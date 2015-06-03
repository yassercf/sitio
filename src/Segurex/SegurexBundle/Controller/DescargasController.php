<?php

namespace Segurex\SegurexBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;

use Segurex\SegurexBundle\Entity\Descargas;
use Segurex\SegurexBundle\Form\DescargasType;

/**
 * Descargas controller.
 *
 */
class DescargasController extends Controller
{

    /**
     * Lists all Descargas entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entitiesD = $em->getRepository('SegurexBundle:Descargas')->findAll();

        return $this->render('SegurexBundle:Descargas:index.html.twig', array(
            'entitiesD' => $entitiesD,
        ));
    }
    /**
     * Creates a new Descargas entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Descargas();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

            
        if ($form->isValid()) {
            $entity->setFecha(new \DateTime("now"));
            $dir=$this->getUploadRootDir();

            $file=$form['ruta']->getData();
            $file->move($dir, $file->getClientOriginalName());
            // var_dump($this->getUploadDir().'/'.$file->getClientOriginalName());
            // exit();
            $entity->setRuta($this->getUploadDir().'/'.$file->getClientOriginalName());

            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('descargas_show', array('id' => $entity->getId())));
        }

        return $this->render('SegurexBundle:Descargas:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    protected function getUploadRootDir()
    {
        // la ruta absoluta del directorio donde se deben
        // guardar los archivos cargados
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // se deshace del __DIR__ para no meter la pata
        // al mostrar el documento/imagen cargada en la vista.
        return 'uploads/descargas';
    }

    /**
     * Creates a form to create a Descargas entity.
     *
     * @param Descargas $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Descargas $entity)
    {
        $form = $this->createForm(new DescargasType(), $entity, array(
            'action' => $this->generateUrl('descargas_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Descargas entity.
     *
     */
    public function newAction()
    {
        $entity = new Descargas();
        $form   = $this->createCreateForm($entity);

        return $this->render('SegurexBundle:Descargas:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Descargas entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SegurexBundle:Descargas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Descargas entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SegurexBundle:Descargas:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Descargas entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SegurexBundle:Descargas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Descargas entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SegurexBundle:Descargas:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Descargas entity.
    *
    * @param Descargas $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Descargas $entity)
    {
        $form = $this->createForm(new DescargasType(), $entity, array(
            'action' => $this->generateUrl('descargas_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Descargas entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SegurexBundle:Descargas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Descargas entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('descargas_edit', array('id' => $id)));
        }

        return $this->render('SegurexBundle:Descargas:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Descargas entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SegurexBundle:Descargas')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Descargas entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('descargas'));
    }

    /**
     * Creates a form to delete a Descargas entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('descargas_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
