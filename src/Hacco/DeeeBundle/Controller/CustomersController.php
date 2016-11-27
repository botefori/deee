<?php

namespace Hacco\DeeeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Hacco\DeeeBundle\Entity\Customers;
use Hacco\DeeeBundle\Form\CustomersType;

/**
 * Customers controller.
 *
 * @Route("/customers")
 */
class CustomersController extends Controller
{

    /**
     * Lists all Customers entities.
     *
     * @Route("/", name="customers")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('HaccoDeeeBundle:Customers')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Customers entity.
     *
     * @Route("/", name="customers_create")
     * @Method("POST")
     * @Template("HaccoDeeeBundle:Customers:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Customers();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            
            $message=  \Swift_Message::newInstance()
                        ->setSubject('Demande information pour client')
                        ->setFrom(array('devisdeliver@haccomitry.fr'=>'hacco mitry'))
                        ->setTo($entity->getEmail())
                        ->setCc(array('devisdeliver@haccomitry.fr', 'botefori@gmail.com'))
                        ->setCharset('utf-8')
                        ->setBody($this->renderView('HaccoDeeeBundle:Customers:asK.html.twig', array('data'=>$entity)),'text/html');
                         $this->get('mailer')->send($message);
            
              // On force l'envoie des mails du spool avec le code-ci dessous
             $mailer = $this->get('mailer');
  
                $transport = $mailer->getTransport();
                if ($transport instanceof Swift_Transport_SpoolTransport) {
                    $spool = $transport->getSpool();
                    $sent = $spool->flushQueue($this->get('swiftmailer.transport.real'));
                }
            return $this->redirect($this->generateUrl('customers_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Customers entity.
     *
     * @param Customers $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Customers $entity)
    {
        $form = $this->createForm(new CustomersType(), $entity, array(
            'action' => $this->generateUrl('customers_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Customers entity.
     *
     * @Route("/new", name="customers_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Customers();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Customers entity.
     *
     * @Route("/{id}", name="customers_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HaccoDeeeBundle:Customers')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Customers entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Customers entity.
     *
     * @Route("/{id}/edit", name="customers_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HaccoDeeeBundle:Customers')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Customers entity.');
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
    * Creates a form to edit a Customers entity.
    *
    * @param Customers $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Customers $entity)
    {
        $form = $this->createForm(new CustomersType(), $entity, array(
            'action' => $this->generateUrl('customers_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Customers entity.
     *
     * @Route("/{id}", name="customers_update")
     * @Method("PUT")
     * @Template("HaccoDeeeBundle:Customers:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HaccoDeeeBundle:Customers')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Customers entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('customers_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Customers entity.
     *
     * @Route("/{id}", name="customers_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('HaccoDeeeBundle:Customers')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Customers entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('customers'));
    }

    /**
     * Creates a form to delete a Customers entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('customers_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
