<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Nom', null, [
                'attr' => [
                    'style' => 'width: 300px;', // Ajustez la valeur selon vos besoins
                    'class' => 'form-control-sm' // Si vous utilisez Bootstrap
                ]
            ])
            ->add('Prenom', null, [
                'attr' => [
                    'style' => 'width: 300px;', // Ajustez la valeur selon vos besoins
                    'class' => 'form-control-sm' // Si vous utilisez Bootstrap
                ]
            ])
            ->add('Telephone', null, [
                'attr' => [
                    'style' => 'width: 300px;', // Ajustez la valeur selon vos besoins
                    'class' => 'form-control-sm' // Si vous utilisez Bootstrap
                ]
            ])
            ->add('Email', null, [
                'attr' => [
                    'style' => 'width: 300px;', // Ajustez la valeur selon vos besoins
                    'class' => 'form-control-sm' // Si vous utilisez Bootstrap
                ]
            ])
            ->add('Sujet', null, [
                'attr' => [
                    'style' => 'width: 300px;', // Ajustez la valeur selon vos besoins
                    'class' => 'form-control-sm' // Si vous utilisez Bootstrap
                ]
            ])
            ->add('Message',TextareaType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
