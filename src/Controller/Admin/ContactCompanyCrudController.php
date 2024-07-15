<?php

namespace App\Controller\Admin;

use App\Entity\ContactCompany;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ContactCompanyCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ContactCompany::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name', 'Nom de l\'entreprise'),
            TextField::new('name_of_boss', 'Nom du patron'),
            TextField::new('address', 'Adresse'),
            TextField::new('siret', 'Siret'),
            IntegerField::new('zipcode', 'Code postal'),
            TextField::new('city', 'Ville'),
            TextField::new('country', 'Pays'),
            DateField::new('created_at', 'Créé le')->hideOnForm(),
        ];
    }

    public function persistEntity(EntityManagerInterface $em, $entityInstance): void
    {
        if (!$entityInstance instanceof ContactCompany) return;

        $entityInstance->setCreatedAt(new \DateTimeImmutable());
        parent::persistEntity($em, $entityInstance);
    }

    public function updateEntity(EntityManagerInterface $em, $entityInstance): void
    {
        if (!$entityInstance instanceof ContactCompany) return;

        $entityInstance->setCreatedAt(new \DateTimeImmutable());
        parent::updateEntity($em, $entityInstance);
    }

    public function deleteEntity(EntityManagerInterface $em, $entityInstance): void
    {
        if (!$entityInstance instanceof ContactCompany) return;

        parent::deleteEntity($em, $entityInstance);
    }
}
