<?php

namespace Hacco\DeeeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Customers controller.
 *
 * @Route("/home")
 */
class HomeController extends Controller
{

    /**
     * Display the default front page.
     *
     * @Route("/", name="home")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }
    
    
    /**
     * Display the default front page.
     *
     * @Route("/services", name="home_services")
     * @Method("GET")
     * @Template()
     */
    public function servicesAction(){
        return array();
    }
   
}
