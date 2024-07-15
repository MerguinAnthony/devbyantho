<?php

namespace App\Controller\Admin;

use App\Entity\Benefit;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\PercentField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class BenefitCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Benefit::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('wording', 'Libellé'),
            TextEditorField::new('description', 'Description'),
            MoneyField::new('unitPrice', 'Prix HT')->setCurrency('EUR'),
            PercentField::new('taxe', 'TVA')->setNumDecimals(2),
        ];
    }

    public function persistEntity(EntityManagerInterface $em, $entityInstance): void
    {
        if (!$entityInstance instanceof Benefit) return;

        parent::persistEntity($em, $entityInstance);
    }

    public function updateEntity(EntityManagerInterface $em, $entityInstance): void
    {
        if (!$entityInstance instanceof Benefit) return;

        parent::updateEntity($em, $entityInstance);
    }

    public function deleteEntity(EntityManagerInterface $em, $entityInstance): void
    {
        if (!$entityInstance instanceof Benefit) return;

        parent::deleteEntity($em, $entityInstance);
    }
}
