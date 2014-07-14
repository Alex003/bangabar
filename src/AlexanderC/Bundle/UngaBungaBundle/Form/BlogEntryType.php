<?php

namespace AlexanderC\Bundle\UngaBungaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BlogEntryType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, array('label' => 'Заголовок'))
            ->add('image_url',
                  'url',
                  array(
                      'label' => 'URL Картинки',
                      'attr' => array(
                          'onclick' => "$(this).attachmentUpload()"
                      )
                  ))
            ->add('text', null, array('label' => 'Текст', 'attr' => array('class' => 'wysi') ))
            //->add('slug')
            //->add('created')
            //->add('updated')
            ->add('category', null, array('label' => 'Категория', 'required' => true))
            ->add('on_homepage', 'checkbox', array('label' => 'Показывать на главной', 'required' => false))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AlexanderC\Bundle\UngaBungaBundle\Entity\BlogEntry'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'alexanderc_bundle_ungabungabundle_blogentry';
    }
}
