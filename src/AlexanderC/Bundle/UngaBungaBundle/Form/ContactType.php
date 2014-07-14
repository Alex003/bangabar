<?php
/**
 * @author AlexanderC <self@alexanderc.me>
 * @date 3/5/14
 * @time 1:50 PM
 */

namespace AlexanderC\Bundle\UngaBungaBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Collection;

class ContactType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array(
                            'attr' => array(
                                'placeholder' => 'Ваше Имя',
                                'pattern'     => '.{2,}' //minlength
                            )
                        ))
            ->add('email', 'email', array(
                             'attr' => array(
                                 'placeholder' => 'Ваш эл. адрес'
                             )
                         ))
            ->add('subject', 'text', array(
                               'attr' => array(
                                   'placeholder' => 'Тема Письма',
                                   'pattern'     => '.{3,}' //minlength
                               )
                           ))
            ->add('message', 'textarea', array(
                               'attr' => array(
                                   'cols' => 90,
                                   'rows' => 10,
                                   'placeholder' => 'Текст письма...'
                               )
                           ));
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $collectionConstraint = new Collection(array(
                                                   'name' => array(
                                                       new NotBlank(array('message' => 'Вы должны указать ваше имя.')),
                                                       new Length(array('min' => 2))
                                                   ),
                                                   'email' => array(
                                                       new NotBlank(array('message' => 'Эл. адрес должен быть указан.')),
                                                       new Email(array('message' => 'Неверный формат эл. адреса.'))
                                                   ),
                                                   'subject' => array(
                                                       new NotBlank(array('message' => 'Вы должны указать тему письма.')),
                                                       new Length(array('min' => 3))
                                                   ),
                                                   'message' => array(
                                                       new NotBlank(array('message' => 'Вы должны указать текст письма.')),
                                                       new Length(array('min' => 5))
                                                   )
                                               ));

        $resolver->setDefaults(array(
                                   'constraints' => $collectionConstraint
                               ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ungabunga_contact';
    }
} 