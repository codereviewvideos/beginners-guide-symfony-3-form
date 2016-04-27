<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('integer', IntegerType::class)
            ->add('float', FloatType::class, [
                'attr' => [
                    'step' => 0.5
                ]
            ])
            ->add('number', NumberType::class, [
                'scale' => 3,
                'attr' => [
                    'step' => 0.001,
                    'min'  => 10,
                    'max'  => 20,
                ]
            ])
            ->add('save', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Product',
            'csrf_protection' => false,
        ]);
    }
}
