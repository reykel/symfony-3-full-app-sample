<?php
// src/AppBundle/Form/UserType.php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, array('attr'=> array('class'=>'form-control', 'style'=>'font-size:14px', 'placeholder'=>'Correo electrónico')))
            ->add('username', TextType::class, array('attr'=> array('class'=>'form-control', 'style'=>'font-size:14px', 'placeholder'=>'Nombre de usuario')))
            ->add('area', TextType::class, array('attr'=> array('class'=>'form-control', 'style'=>'font-size:14px', 'placeholder'=>'Area de trabajo')))
            ->add('password', RepeatedType::class, array(
                'type' => PasswordType::class,
                'first_options'  => array('label' => 'Password', 'attr'=> array('class'=>'form-control', 'style'=>'font-size:14px', 'placeholder'=>'Contraseña')),                
                'second_options' => array('label' => 'Repetir Password', 'attr'=> array('class'=>'form-control', 'style'=>'font-size:14px', 'placeholder'=>'Repetir contraseña')),                
            )
        );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\User'
        ));
    }
}