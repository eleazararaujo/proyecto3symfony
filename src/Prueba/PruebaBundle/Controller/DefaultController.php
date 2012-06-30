<?php

namespace Prueba\PruebaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('PruebaPruebaBundle:Default:index.html.twig', array('name' => $name));
    }
}
