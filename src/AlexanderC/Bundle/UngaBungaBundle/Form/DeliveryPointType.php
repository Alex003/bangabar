<?php

namespace AlexanderC\Bundle\UngaBungaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DeliveryPointType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, array('label' => 'Название'))
            ->add('info', null, array('label' => 'Информация', 'attr' => array('class' => 'wysi') ))
            //->add('slug')
            //->add('created')
            //->add('updated')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AlexanderC\Bundle\UngaBungaBundle\Entity\DeliveryPoint'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'alexanderc_bundle_ungabungabundle_deliverypoint';
    }
}
