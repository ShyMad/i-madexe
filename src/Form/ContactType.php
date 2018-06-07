<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('mail', EmailType::class ,array(
                'attr' => ['class'=>'form-control'],
            ))
            ->add('tel',TelType::class, array(
                'attr' => ['class'=>'form-control'],
            ))
            ->add('address',null, array(
                'attr' => ['class'=>'form-control'],
            ))
            ->add('country',CountryType::class, array(
                'attr' => ['class'=>'form-control'],
            ))
            ->add('city',TextType::class, array(
                'attr' => ['class'=>'form-control'],
            ))
            ->add('cp',TextType::class, array(
                'attr' => ['class'=>'form-control'],
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
