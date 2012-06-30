<?php

namespace Usuarios\RegistroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="usuario")
 */

class Usuario {
    
  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   */
   protected $id; 
    
           
  /**
   * @ORM\Column(type="string", length=100, unique=TRUE)
   */        
   protected $username;
   
   /**
   * @ORM\Column(type="string", length=100)
   */        
   protected $nickname;
   
  /**
   * @ORM\Column(type="string", length=100)
   */
   protected $password;    
  
   /**
   * @ORM\Column(type="string", length=100, unique=TRUE)
   */  
   protected $email;    
   
   public function getUsername(){
        return $this->username;
    }
    
    public function setUsername($username){
        $this->username = $username;
    }

    public function getPassword(){
        return $this->password;
    }
    
    public function setPassword($password){
        $this->password = $password;
    }
    
    public function getNickname(){
        return $this->nickname;
    }
    
    public function setNickname($nickname){
        $this->nickname = $nickname;
    }
    
    public function getEmail(){
        return $this->email;
    }
    
    public function setEmail($email){
        $this->email = $email;
    }
}

?>
