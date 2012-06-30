<?php

namespace Acme\TaskBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\TaskBundle\Entity\Task;
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
    
    public function newAction (Request $request){
        
        $task = new Task();
        $task->setTask('Write a blog post');
        $task->setDueDate(new \DateTime('tomorrow'));
        
        $form = $this->createFormBuilder($task)
                ->add('task', 'text')
                ->add('dueDate','date')
                ->getForm();
        
        if ($request->getMethod() == 'POST'){
            $form->bindRequest($request);
            
            if ($form->isValid()){
                return $this->redirect($this->generateUrl('task_success'));
            }
        }
        
        return $this->render('AcmeTaskBundle:Default:new.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    
}
