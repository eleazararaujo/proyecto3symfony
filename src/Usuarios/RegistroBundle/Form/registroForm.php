<?php

namespace Usuarios\RegistroBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class registroForm extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('username');
        $builder->add('nickname');
        $builder->add('email','email');
        $builder->add('password','password');
        $builder->add('passwordco','password');
        #$builder->add('dueDate', null, array('widget' => 'single_text'));
    }

    public function getName()
    {
        return 'registroForm';
    }
}

?>
