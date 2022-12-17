<?php

namespace App\Controller\Admin;

use App\Admin\Field\VichImageField;
use App\Entity\IndexServices;
use App\Form\IndexServiceItemType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;

class IndexServicesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return IndexServices::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title1'),
            TextField::new('title2')->onlyOnForms(),
            TextareaField::new('description'),
            CollectionField::new('items')->setEntryType(IndexServiceItemType::class)->setFormTypeOption('by_reference', false),
            TextField::new('buttonTitle'),
            UrlField::new('buttonLink'),
            VichImageField::new('imageFile')->onlyOnForms(),
        ];
    }
}
