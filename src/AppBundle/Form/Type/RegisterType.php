<?php

namespace MyappBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\OptionsResolver\OptionsResolver;
//use EBT\OptionsResolver\Model\OptionsResolver\OptionsResolver;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder
            ->add('name', TextType::class, array(
                    'label' => 'Your Name',
                    'label_attr' => array(
                        'attr' => array(
                            'class' => 'control-label'
                        )
                    ),
                    'attr' => array(
                        'class' => 'form-control'
                    )
                ))
            ->add('email', EmailType::class, array(
                    'label' => 'Your Email',
                    'label_attr' => array(
                        'attr' => array(
                            'class' => 'control-label'
                        )
                    ),
                    'attr' => array(
                        'class' => 'form-control'
                    )
                ))
            ->add('password',RepeatedType::class, array(
                    'type' => PasswordType::class, array(
                        'first_options'  => array(
                            'label' => 'Your Password', array(
                                'label_attr' => array(
                                    'attr' =>array(
                                        'class'=> 'control-label'
                                    )
                                )
                            ),
                            'attr' => array(
                                'class' => 'form-control'
                            )
                        ),
                        'second_options' => array(
                            'label' => 'Repeat Password', array(
                                'label_attr' => array(
                                    'attr' =>array(
                                        'class'=> 'control-label'
                                    )
                                )
                            ),
                            'attr' => array(
                                'class' => 'form-control'
                            )
                        )


                )))
            ->add('tel', NumberType::class, array(
                    'label' => 'Your Telephone number',
                    'label_attr' => array(
                        'attr' => array(
                            'class' => 'control-label'
                        )
                    ),
                    'attr' => array(
                        'class' => 'form-control'
                    )
                ))
            ->add('register', 'submit', array(
                    'attr' => array(
                        'class' => 'btn btn-default'
                    )
                ));
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'MyappBundle\Entity\Users',
            )
        );
    }
//    public function __construct(array $options = array())
//    {
//        $this->options = $options;
//
//        $resolver = new OptionsResolver();
//        $resolver->setDefaults(array(
//                'data_class'     => 'MyappBundle\Entity\Users',
//            ));
//        $this->options = $resolver->resolve($options);
//    }

    public function getName(){
        return 'register';
    }
}