<?php
namespace Acme\TaskBundle\Entity;

class Task
{
    protected $nombre;
    protected $color;
    
    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($name){
        $this->nombre = $name;
    }
    
    public function getColor(){
        return $this->color;
    }
    public function setColor($color){
        $this->color = $color;
    }
    
    
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
