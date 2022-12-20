<?php

namespace App\Controller\Admin;

use App\Admin\Field\VichImageField;
use App\Entity\PageSettings;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PageSettingsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PageSettings::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            VichImageField::new('imageFile')->onlyOnForms(),
            TextareaField::new('description'),
            TextField::new('phone'),
            TextField::new('email'),
            TextField::new('copywriter'),
        ];
    }

}
