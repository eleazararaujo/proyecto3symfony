<?php

namespace Usuarios\LoginBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class loginForm extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('username');
        $builder->add('password','password');
        #$builder->add('dueDate', null, array('widget' => 'single_text'));
    }

    public function getName()
    {
        return 'loginForm';
    }
}

?>
