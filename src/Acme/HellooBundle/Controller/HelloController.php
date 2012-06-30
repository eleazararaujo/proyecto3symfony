

<?php
namespace Acme\HellooBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HelloController extends Controller
{
    public function  indexAction($name){
        return $this->render('AcmeHellooBundle:Hello:index.html.twig', 
                array('name'=> $name));
        
    }
    
    
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
