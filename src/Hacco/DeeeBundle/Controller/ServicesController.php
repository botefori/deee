<?php

namespace Hacco\DeeeBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ServicesController extends Controller
{
    /**
     * @Route("services/", name="Our_services")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        return array(
                // ...
            );   
    }
    
    /**
     * @Route("aboutus/", name="Our_aboutus")
     * @Method("GET")
     * @Template()
     */
    public function aboutusAction()
    {
        return array(
                // ...
            );   
    }

}
