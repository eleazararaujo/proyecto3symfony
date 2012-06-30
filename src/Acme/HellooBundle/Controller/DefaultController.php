<?php

namespace Acme\HellooBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('AcmeHellooBundle:Default:index.html.twig', array('name' => $name));
    }
}
