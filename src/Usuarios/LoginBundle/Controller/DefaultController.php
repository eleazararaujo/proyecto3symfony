<?php

namespace Usuarios\LoginBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Usuarios\LoginBundle\Form\loginForm;
use Usuarios\LoginBundle\Entity\Login;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('UsuariosLoginBundle:Default:index.html.twig', 
                array('name' => $name));
    }
    
        public function loginAction(Request $request)
    {
        $login = new Login();
        $login->setUsername('Tu nombre de usuario aqui');
        $login->setPassword('Contrasena aqui');

        $form = $this->createForm(new loginForm(), $login);
        
         if ($request->getMethod() == 'POST'){
            $form->bindRequest($request);
            
            if ($form->isValid()){
                   $data = $form->getData();
                   $username = $data->getUsername();
                   $password = $data->getPassword();
                   
                   $usuario = $this->getDoctrine()
                    ->getRepository('UsuariosRegistroBundle:Usuario')
                    ->findOneBy(array('username' => $username, 
                                      'password' => $password));
                   
                    if (!$usuario) {
                        return $this->render('UsuariosLoginBundle:Default:login.html.twig', array(
                            'form' => $form->createView(), 'errores' => 'Usuario o contrasena incorrecta'
        ));        
                    }
                                      
                   if (!isset($_SESSION))
                       session_start();
                   $_SESSION['nickname'] = $usuario->getNickname();
                return $this->render('UsuariosLoginBundle:Default:Exito.html.twig',
                array('nickname' => $_SESSION['nickname']));
            }
        }

        return $this->render('UsuariosLoginBundle:Default:login.html.twig', array(
            'form' => $form->createView(), 'errores' => ''
        ));        
    }
    
    public function logoutAction(Request $request)
    {
        session_destroy();
        return $this->render('UsuariosLoginBundle:Default:logout.html.twig');
    }
    
    public function exitoAction(Request $request)
    {   
        if (!isset($_SESSION))
            return $this->forward('UsuariosLoginBundle:Default:login');
    
        return $this->render('UsuariosLoginBundle:Default:Exito.html.twig');
    }
}

