<?php

namespace AlexanderC\Bundle\UngaBungaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Collection;

class ShopEntryType extends AbstractType
{

        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, array('label' => 'Название'))
            ->add('price', 'integer', array('label' => 'Цена'))
            ->add('image_url',
                  'url',
                  array(
                      'label' => 'URL Картинки',
                      'attr' => array(
                          'onclick' => "$(this).attachmentUpload()"
                      )
                  ))
            ->add('sale', null, array('label' => 'Распродажа', 'required' => false))
            ->add('bestseller', null, array('label' => 'Хит Продаж', 'required' => false))
            ->add('delivery_points', 'entity', array(
                 'class' => 'AlexanderC\Bundle\UngaBungaBundle\Entity\DeliveryPoint',
                 'property'     => 'name',
                 'multiple'     => true,
                'expanded' => true,
                'label' => 'Пункты выдачи'
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AlexanderC\Bundle\UngaBungaBundle\Entity\ShopEntry'
        ));

    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'alexanderc_bundle_ungabungabundle_shopentry';
    }
}
