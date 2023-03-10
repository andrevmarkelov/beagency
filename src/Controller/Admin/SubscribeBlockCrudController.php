<?php

namespace App\Controller\Admin;

use App\Admin\Field\VichImageField;
use App\Entity\SubscribeBlock;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SubscribeBlockCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SubscribeBlock::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title1'),
            TextField::new('title2'),
            TextareaField::new('description'),
            TextField::new('buttonTitle'),
            VichImageField::new('imageFile')->onlyOnForms()
        ];
    }
}
