<?php

namespace App\Form;

use App\Entity\Messages;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Report\Text;
use Symfony\Component\Validator\Constraints\NotBlank;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('lastName', TextType::class, [
                'label' => 'Nom *',
                'attr' => [
                    'placeholder' => 'Votre nom',
                    'class' => 'form-control col-md-6',
                ],
            ])
            ->add('firstName', TextType::class, [
                'label' => 'Prénom *',
                'attr' => [
                    'placeholder' => 'Votre prénom',
                    'class' => 'form-control',
                ],
            ])
            ->add('email', TextType::class, [
                'label' => 'Email *',
                'attr' => [
                    'placeholder' => 'Votre email',
                    'class' => 'form-control',
                ],
            ])
            ->add('phone', TextType::class, [
                'label' => 'Téléphone',
                'attr' => [
                    'placeholder' => 'Votre téléphone',
                    'class' => 'form-control',
                ],
                'required' => false,
            ])
            ->add('message', TextareaType::class, [
                'label' => 'Message *',
                'attr' => [
                    'placeholder' => 'Votre message',
                    'class' => 'form-control',
                ],
            ])
            ->add('rgpd', CheckboxType::class, [
                'label' => 'J’autorise Dev by Antho à me contacter de façon personnalisée à propos de ses services. Vos données personnelles ne seront jamais communiquées à des tiers.',
                'label_attr' => [
                    'class' => 'form-check-label',
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Vous devez accepter les conditions d\'utilisation.',
                    ])
                ],
                'mapped' => false,
                'required' => true,
                'attr' => [
                    'class' => 'form-check-label',
                ],
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Envoyer',
                'attr' => [
                    'class' => 'btn btn-primary',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Messages::class,
        ]);
    }
}
