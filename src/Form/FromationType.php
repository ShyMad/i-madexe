<?php

namespace App\Form;

use App\Entity\Fromation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class FromationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title',TextType::class,array(
                'attr' => ['class'=>'form-control']
            ))
            ->add('country',CountryType::class,array(
                'attr' => ['class'=>'form-control']
            ))
            ->add('city',TextType::class,array(
                'attr' => ['class'=>'form-control']
            ))
            ->add('yearOfStart',NumberType::class,array(
                'attr' => ['class'=>'form-control']
            ))
            ->add('yearOfEnd',NumberType::class,array(
                'attr' => ['class'=>'form-control']
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Fromation::class,
        ]);
    }
}
