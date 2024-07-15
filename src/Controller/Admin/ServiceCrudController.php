<?php

namespace App\Controller\Admin;

use App\Entity\Service;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ServiceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Service::class;
    }

    public const SERVICE_BASE_PATH = 'assets/servicesImg';
    public const SERVICE_UPLOAD_DIR = 'public/assets/servicesImg';

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('Nom', 'Nom'),
            TextEditorField::new('description', 'Description'),
            ImageField::new('imageName', 'Image')
                ->setBasePath(self::SERVICE_BASE_PATH)
                ->setUploadDir(self::SERVICE_UPLOAD_DIR),
            TextField::new('abrev_def', 'Abreviation'),
            BooleanField::new('affichage', 'Affichage'),
        ];
    }

    public function persistEntity(EntityManagerInterface $em, $entityInstance): void
    {
        if (!$entityInstance instanceof Service) return;

        parent::persistEntity($em, $entityInstance);
    }

    public function updateEntity(EntityManagerInterface $em, $entityInstance): void
    {
        if (!$entityInstance instanceof Service) return;

        parent::updateEntity($em, $entityInstance);
    }

    public function deleteEntity(EntityManagerInterface $em, $entityInstance): void
    {
        if (!$entityInstance instanceof Service) return;

        parent::deleteEntity($em, $entityInstance);
    }
}
