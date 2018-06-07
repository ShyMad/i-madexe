<?php

namespace App\Form;

use App\Entity\Experience;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;

class ExperienceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $builder
            ->add('tite',TextType::class,array(
                'attr' => ['class'=>'form-control']
            ))
            ->add('dateOfStart', DateType::class ,array(
                'widget' => 'single_text',

                //prevent rendering it as type =date to avoide HTML5
                'html5' => false,

                // i added a class that can be selected in JS
                'attr' => ['class' => 'js-datepicker form-control'],
                
            ))
            ->add('dateOfEnd', DateType::class ,array(
                'widget' => 'single_text',

                //prevent rendering it as type =date to avoide HTML5
                'html5' => false,

                // i added a class that can be selected in JS
                'attr' => ['class' => 'js-datepicker form-control'],
                
            ))
            ->add('company',TextType::class,array(
                'attr' => ['class'=>'form-control']
            ))
            ->add('country',CountryType::class,array(
                'attr' => ['class'=>'form-control']
            ))
            ->add('city',TextType::class,array(
                'attr' => ['class'=>'form-control']
            ))
            ->add('body',null,array(
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
            'data_class' => Experience::class,
        ]);
    }
}
