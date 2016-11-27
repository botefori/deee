<?php

namespace Hacco\DeeeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Hacco\DeeeBundle\Entity\Materiels;
use Hacco\DeeeBundle\Form\MaterielsType;

/**
 * Materiels controller.
 *
 * @Route("/materiels")
 */
class MaterielsController extends Controller
{

    /**
     * Lists all Materiels entities.
     *
     * @Route("/", name="materiels")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('HaccoDeeeBundle:Materiels')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Materiels entity.
     *
     * @Route("/", name="materiels_create")
     * @Method("POST")
     * @Template("HaccoDeeeBundle:Materiels:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Materiels();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('materiels_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Materiels entity.
     *
     * @param Materiels $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Materiels $entity)
    {
        $form = $this->createForm(new MaterielsType(), $entity, array(
            'action' => $this->generateUrl('materiels_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Materiels entity.
     *
     * @Route("/new", name="materiels_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Materiels();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Materiels entity.
     *
     * @Route("/{id}", name="materiels_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HaccoDeeeBundle:Materiels')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Materiels entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Materiels entity.
     *
     * @Route("/{id}/edit", name="materiels_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HaccoDeeeBundle:Materiels')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Materiels entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Materiels entity.
    *
    * @param Materiels $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Materiels $entity)
    {
        $form = $this->createForm(new MaterielsType(), $entity, array(
            'action' => $this->generateUrl('materiels_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Materiels entity.
     *
     * @Route("/{id}", name="materiels_update")
     * @Method("PUT")
     * @Template("HaccoDeeeBundle:Materiels:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HaccoDeeeBundle:Materiels')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Materiels entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('materiels_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Materiels entity.
     *
     * @Route("/{id}", name="materiels_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('HaccoDeeeBundle:Materiels')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Materiels entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('materiels'));
    }

    /**
     * Creates a form to delete a Materiels entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('materiels_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
