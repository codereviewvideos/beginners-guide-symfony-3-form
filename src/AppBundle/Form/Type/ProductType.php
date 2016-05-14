<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    const AWING = 'awing';
    const BWING = 'bwing';
    const XWING = 'xwing';
    const YWING = 'ywing';

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('choice', ChoiceType::class, [
                'choices' => [
                    'A-Wing' => self::AWING,
                    'B-Wing' => self::BWING,
                    'X-Wing' => self::XWING,
                    'Y-Wing' => self::YWING,
                ],
                'label'      => 'Optimal way to kill a tie-fighter?',
                'preferred_choices' => function ($choice, $key) {
                    return substr($choice, 0, 1) < "m";
                },
                'expanded'  => true,
                'multiple'  => true,
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
