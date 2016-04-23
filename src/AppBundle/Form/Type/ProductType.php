<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PercentType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class)
            ->add('description', TextareaType::class)
            ->add('email', EmailType::class)
            ->add('integer', IntegerType::class)
            ->add('money', MoneyType::class)
            ->add('number', NumberType::class)
            ->add('percent', PercentType::class, [
                'type' => 'fractional',
            ])
            ->add('url', UrlType::class)
            ->add('range', RangeType::class, [
                'attr' => [
                    'data-slider-ticks' => '[0,33,66,100]',
                    'data-provide' => "slider",
                    'data-slider-ticks-labels' => '["no thanks", "it is ok", "i like it", "so fetch"]',
                    'style' => 'width: 100%'
                ]
            ])
//            ->add('availableFrom', DateTimeType::class)
            ->add('save', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
//        $resolver->setDefaults([
//            'data_class' => 'AppBundle\Entity\Product'
//        ]);
    }
}
