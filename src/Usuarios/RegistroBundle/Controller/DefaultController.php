<?php

namespace Usuarios\RegistroBundle\Controller;
    
use Symfony\Component\HttpFoundation\Request;
use Usuarios\RegistroBundle\Form\registroForm;
use Usuarios\RegistroBundle\Entity\Registro;
use Usuarios\RegistroBundle\Entity\Usuario;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction()
    {
        return $this->render('UsuariosRegistroBundle:Default:index.html.twig');
    }
    
    public function registroAction(Request $request)
    {
        if (!isset($_SESSION))
            return $this->forward('UsuariosLoginBundle:Default:login');
        $errores = array("","","");
        $registro = new Registro();
        $registro->setUsername('Tu nombre de usuario aqui');
        $registro->setNickname('Tu nombre publico aqui');
        $registro->setPassword('Contrasena aqui');
        $registro->setPasswordco('Repite la contrasena');

        $form = $this->createForm(new registroForm(), $registro);
        
         if ($request->getMethod() == 'POST'){
            $form->bindRequest($request);
            
            if ($form->isValid()){
                   $data = $form->getData();
                   $username = $data->getUsername();
                   $nickname = $data->getNickname();
                   $password = $data->getPassword();
                   $email = $data->getEmail();                   
                   
                   $repository = $this->getDoctrine()
                    ->getRepository('UsuariosRegistroBundle:Usuario');
                   
                   $usuario1 = $repository->findOneBy(array('username' => $username));
                   $usuario2 = $repository->findOneBy(array('nickname' => $nickname));
                   $usuario3 = $repository->findOneBy(array('email' => $email));
                   
                   
                   
                   if ($usuario1 || $usuario2 || $usuario3)
                   {
                        if ($usuario1) 
                            $errores[0]="El nombre de usuario ya esta tomado ";
                        if ($usuario2) 
                            $errores[1]="El nombre publico ya esta tomado ";
                        if ($usuario3) 
                            $errores[2]="Ya existe alguien con ese correo ";
                        return $this->render('UsuariosRegistroBundle:Default:registro.html.twig', array(
                                        'form' => $form->createView(), 
                                        'errores' => $errores));        
                   } 
                   else {
                        $usuario = new Usuario();
                        $usuario->setUsername($username);
                        $usuario->setNickname($nickname);
                        $usuario->setPassword($password);
                        $usuario->setEmail($email);
                        $em = $this->getDoctrine()->getEntityManager();
                        $em->persist($usuario);
                        $em->flush();
                        return $this->forward('UsuariosRegistroBundle:Default:exito');
                       
                   }      
                   
            }
        }

        return $this->render('UsuariosRegistroBundle:Default:registro.html.twig', array(
                                        'form' => $form->createView(), 
                                        'errores' => $errores));      
    }
    
    public function exitoAction(Request $request)
    {
        if (!isset($_SESSION))
            return $this->forward('UsuariosLoginBundle:Default:login');
        return $this->render('UsuariosRegistroBundle:Default:index.html.twig');
    }
}
