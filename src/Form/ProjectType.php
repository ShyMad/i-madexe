<?php

namespace App\Form;

use App\Entity\Project;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //->add()
            ->add('title', TextType::class, array(
                'attr' => ['class'=>'form-control'],
            ))
            ->add('devDate', DateType::class ,array(
                'widget' => 'single_text',

                //prevent rendering it as type =date to avoide HTML5
                'html5' => false,

                // i added a class that can be selected in JS
                'attr' => ['class' => 'js-datepicker form-control'],
                
            ))
            ->add('technologyUsed',null, array(
                'attr' => ['class'=>'form-control'],
            ))
            ->add('state',null, array(
                'attr' => ['class'=>'form-control'],
            ))
            ->add('body',null, array(
                'attr' => ['class'=>'form-control'],
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Project::class,
        ]);
    }
}
