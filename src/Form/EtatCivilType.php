<?php

namespace App\Form;

use App\Entity\EtatCivil;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class EtatCivilType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName',TextType::class,array(
                'attr' => ['class'=>'form-control']
            ))
            ->add('lastName',TextType::class,array(
                'attr' => ['class'=>'form-control']
            ))
            ->add('age',TextType::class,array(
                'attr' => ['class'=>'form-control']
            ))
            ->add('nationality',TextType::class,array(
                'attr' => ['class'=>'form-control']
            ))
            ->add('permis',TextType::class,array(
                'attr' => ['class'=>'form-control']
            ))
            ->add('fonction',TextType::class,array(
                'attr' => ['class'=>'form-control']
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => EtatCivil::class,
        ]);
    }
}
