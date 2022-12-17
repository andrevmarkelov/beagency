<?php

namespace App\Controller\Admin;

use App\Admin\Field\VichImageField;
use App\Entity\AboutItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AboutItemCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return AboutItem::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title'),
            TextareaField::new('description'),
            VichImageField::new('imageFile')->onlyOnForms(),
        ];
    }
}
