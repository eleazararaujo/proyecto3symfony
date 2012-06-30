<?php
namespace Usuarios\RegistroBundle\Entity;

class Registro {
    protected $username;
    protected $password;
    protected $nickname;
    protected $email;
    protected $passwordco;
    
    public function isTheSame()
    {
        return ($this->password == $this->passwordco);
    }
    
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
    
    public function getPasswordCo(){
        return $this->passwordco;
    }
    
    public function setPasswordCo($passwordco){
        $this->passwordco = $passwordco;
    }
}

?>
