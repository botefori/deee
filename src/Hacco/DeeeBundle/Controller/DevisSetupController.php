<?php

namespace Hacco\DeeeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Hacco\DeeeBundle\Entity\DevisSetup;
use Hacco\DeeeBundle\Form\DevisSetupType;

/**
 * DevisSetup controller.
 *
 * @Route("/devissetup")
 */
class DevisSetupController extends Controller
{

    /**
     * Lists all DevisSetup entities.
     *
     * @Route("/", name="devissetup")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('HaccoDeeeBundle:DevisSetup')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new DevisSetup entity.
     *
     * @Route("/", name="devissetup_create")
     * @Method("POST")
     * @Template("HaccoDeeeBundle:DevisSetup:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new DevisSetup();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('devissetup_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a DevisSetup entity.
     *
     * @param DevisSetup $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(DevisSetup $entity)
    {
        $form = $this->createForm(new DevisSetupType(), $entity, array(
            'action' => $this->generateUrl('devissetup_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new DevisSetup entity.
     *
     * @Route("/new", name="devissetup_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new DevisSetup();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }
    
    
    

    /**
     * Finds and displays a DevisSetup entity.
     *
     * @Route("/{id}", name="devissetup_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HaccoDeeeBundle:DevisSetup')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DevisSetup entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

      /**
     * Generate the current devis in pdf format.
     *
     * @Route("/{id}/pdf", name="devissetup_pdf")
     * @Method("GET")
     * @Template()
     */
    public function pdfAction($id){
        
        chdir(dirname(__DIR__));
        
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HaccoDeeeBundle:DevisSetup')->find($id);
        
        $html = $this->renderView('HaccoDeeeBundle:DevisSetup:pdf.html.twig', array('data'=>$entity));
        
        //on appelle le service html2pdf
        $html2pdf = new \HTML2PDF('p','A4','fr');
        //real : utilise la taille réelle
        $html2pdf->pdf->SetDisplayMode('real');
        //writeHTML va tout simplement prendre la vue stocker dans la variable $html pour la convertir en format PDF
        $html2pdf->writeHTML($html);
        $nomfichier='bundles/haccodeee/customers-devis/'.'devis-'.$entity->getId().'-'.$entity->getCustomer()->getCompany().'.pdf';
        $html2pdf->Output($_SERVER['DOCUMENT_ROOT'] .$nomfichier,'F');
         
        $message=  \Swift_Message::newInstance()
                        ->setSubject('Votre devis de la part de HACCO')
                        ->setFrom(array('devisdeliver@haccomitry.fr'=>'hacco mitry'))
                        ->setTo($entity->getCustomer()->getEmail())
                        ->setCc(array('devisdeliver@haccomitry.fr', 'botefori@gmail.com'))
                        ->setCharset('utf-8')
                        ->attach(\Swift_Attachment::fromPath($_SERVER['DOCUMENT_ROOT'] .$nomfichier, "application/octet-stream"))
                        ->setBody($this->renderView('HaccoDeeeBundle:DevisSetup:asK.html.twig', array('data'=>$entity)),'text/html');
                         $this->get('mailer')->send($message);
        
         // On force l'envoie des mails du spool avec le code-ci dessous
        $mailer = $this->get('mailer');
  
        $transport = $mailer->getTransport();
        if ($transport instanceof Swift_Transport_SpoolTransport) {
            $spool = $transport->getSpool();
            $sent = $spool->flushQueue($this->get('swiftmailer.transport.real'));
        }
         return $this->render('HaccoDeeeBundle:DevisSetup:askconfirm.html.twig', array('data' => $entity));
    
           
    }
    
    /**
     * Creates a new RequestDevis entity.
     *
     * @Route("/{id}", name="mail_confirm")
     * @Method("GET")
     * @Template()
     */
    public function mailconfirmAction($id)
    {
       $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HaccoDeeeBundle:DevisSetup')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find RequestDevis entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }
    
    
    
    
    /**
     * Displays a form to edit an existing DevisSetup entity.
     *
     * @Route("/{id}/edit", name="devissetup_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HaccoDeeeBundle:DevisSetup')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DevisSetup entity.');
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
    * Creates a form to edit a DevisSetup entity.
    *
    * @param DevisSetup $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(DevisSetup $entity)
    {
        $form = $this->createForm(new DevisSetupType(), $entity, array(
            'action' => $this->generateUrl('devissetup_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing DevisSetup entity.
     *
     * @Route("/{id}", name="devissetup_update")
     * @Method("PUT")
     * @Template("HaccoDeeeBundle:DevisSetup:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HaccoDeeeBundle:DevisSetup')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DevisSetup entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('devissetup_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a DevisSetup entity.
     *
     * @Route("/{id}", name="devissetup_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('HaccoDeeeBundle:DevisSetup')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find DevisSetup entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('devissetup'));
    }

    /**
     * Creates a form to delete a DevisSetup entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('devissetup_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
