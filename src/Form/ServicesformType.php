<?php

namespace App\Form;

use App\Entity\Service;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ServicesformType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Nom', TextType::class, [
                'label' => 'Nom du service',
            ])
            ->add('description', TextType::class, [
                'label' => 'Description du service',
            ])
            ->add('abrev_def', TextType::class, [
                'label' => 'Abréviation du service',
            ])
            ->add('imageFile', VichImageType::class, [
                'label' => 'Image du service',
                'required' => false,
                'allow_delete' => false,
                'download_uri' => false,
                'download_label' => false,
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Ajouter',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Service::class,
        ]);
    }
}
