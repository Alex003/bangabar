<?php

namespace AlexanderC\Bundle\UngaBungaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CustomerType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', 'email', array('label' => 'Эл. почта'))
            ->add('password', 'repeated', array(
                                'type' => 'password',
                            ))
            //->add('created')
            //->add('updated')
            //->add('promo_code')
            ->add('promo_code_text', 'text', array('label' => 'Промо код'))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AlexanderC\Bundle\UngaBungaBundle\Entity\Customer'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'alexanderc_bundle_ungabungabundle_customer';
    }
}
