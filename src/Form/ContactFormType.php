<?php

namespace App\Form;

use App\Entity\ContactForm;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, array(
                'required' => true,
                'attr' => array(
                    'placeholder' => 'Your name',
                    'maxlength' => 50
                )
            ))
            ->add('email', EmailType::class, array(
                'required' => true,
                'attr' => array(
                    'placeholder' => 'Your e-mail',
                    'maxlength' => 50
                )
            ))
            ->add('subject', TextType::class, array(
                'required' => true,
                'attr' => array(
                    'placeholder' => 'Subject',
                    'maxlength' => 50
                )
            ))
            ->add('message', TextareaType::class, array(
                'required' => true,
                'attr' => array(
                    'placeholder' => 'Message',
                    'rows' => 10,
                    'maxlength' => 60000
                )
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ContactForm::class,
            'csrf_protection' => false
        ]);
    }
}
