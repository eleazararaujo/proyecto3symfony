<?php
namespace Acme\TaskBundle\Entity;

class Task2
{    
    protected $email;
    
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email = $email;
    }    
}
?>
