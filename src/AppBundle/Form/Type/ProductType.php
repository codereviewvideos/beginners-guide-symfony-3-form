<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
//            ->add('date', DateType::class, [
//                'widget' => 'text',
//                'years' => range((new \DateTime('now'))->format('Y'), (new \DateTime('+30 years'))->format('Y'))
//            ])
            ->add('datetime', DateTimeType::class, [
                'widget' => 'single_text',
                'format' => 'yyyy HH:mm:ss dd-MM',
                'input'  => 'datetime',
//                'view_timezone' => 'Australia/Adelaide',
//                'model_timezone' => 'Etc/UTC'
                
            ])
            ->add('save', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Product'
        ]);
    }
}
