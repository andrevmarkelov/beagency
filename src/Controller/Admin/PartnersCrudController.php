<?php

namespace App\Controller\Admin;

use App\Admin\Field\VichImageField;
use App\Entity\Partners;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;

class PartnersCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Partners::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title'),
            UrlField::new('link'),
            VichImageField::new('imageFile')->onlyOnForms(),
        ];
    }
}
