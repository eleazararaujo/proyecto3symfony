<?php

namespace Acme\TaskBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\TaskBundle\Entity\Task;
use Acme\TaskBundle\Entity\Task2;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/hello/{name}")
     * @Template()
     */
    public function indexAction($name)
    {
        return array('name' => $name);
    }
    
    public function successAction()
    {
        return $this->render('AcmeTaskBundle:Default:success.html.twig');
    }
    
    public function newAction (Request $request){
        
        $task = new Task();
        $task->setNombre('Tu nombre aqui');
        $task->setColor('Tu color aqui');
        
        $form = $this->createFormBuilder($task)
                ->add('nombre', 'text')
                ->add('color', 'text')
                ->getForm();
        
        if ($request->getMethod() == 'POST'){
            $form->bindRequest($request);
            
            if ($form->isValid()){
                   $data = $form->getData();
                   $name = $data->getNombre();
                   $color = $data->getColor();
                   if (!isset($_SESSION))
                       session_start();
                   $_SESSION['name'] = $name;
                   $_SESSION['color'] = $color;
                return $this->forward('AcmeTaskBundle:Default:new2');
            }
        }
        
        return $this->render('AcmeTaskBundle:Default:new.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    
    public function new2Action (Request $request){
        
        $task = new Task2();
        $task->setEmail('Tu correo aqui');
        if(isset($_SESSION['name'])){
            $name=$_SESSION['name'];
            $color=$_SESSION['color'];
        }
        else
            return $this->forward('AcmeTaskBundle:Default:new');
               
        
        $form = $this->createFormBuilder($task)
                ->add('email', 'text')                
                ->getForm();
        
        if ($request->getMethod() == 'POST'){
            $form->bindRequest($request);
            
            if ($form->isValid()){
                   $data = $form->getData();
                   $email = $data->getEmail();
                   
                return $this->render('AcmeTaskBundle:Default:success.html.twig',
                        array('name' => $name, 'email' => $email,
                            'color' => $color));
            }
        }
        
        return $this->render('AcmeTaskBundle:Default:new2.html.twig', array( 
            'name' => $name,
            'form' => $form->createView(),
        ));
    }
    
}
