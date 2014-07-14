<?php

namespace AlexanderC\Bundle\UngaBungaBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;

class CustomerLoginType extends CustomerType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', 'email', array('label' => 'Эл. почта'))
            ->add('password', 'password', array('label' => 'Пароль'))
        ;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'alexanderc_bundle_ungabungabundle_customer_login';
    }
}
