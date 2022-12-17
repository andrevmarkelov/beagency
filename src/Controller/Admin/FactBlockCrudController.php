<?php

namespace App\Controller\Admin;

use App\Admin\Field\VichImageField;
use App\Entity\FactBlock;
use App\Form\FactBlockItemType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class FactBlockCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return FactBlock::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title1'),
            TextField::new('title2'),
            TextareaField::new('description'),
            VichImageField::new('imageFile')->onlyOnForms(),
            CollectionField::new('items')->setEntryType(FactBlockItemType::class)->setFormTypeOption('by_reference', false)
        ];
    }
}
