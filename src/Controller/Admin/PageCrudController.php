<?php

namespace App\Controller\Admin;

use App\Admin\Field\VichImageField;
use App\Entity\Page;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Page::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('uuid')->onlyOnForms(),
            FormField::addPanel('SEO'),
            TextField::new('page_title'),
            TextField::new('page_description'),
            FormField::addPanel('Page Content'),
            TextField::new('title_1')->onlyOnForms(),
            TextField::new('title_2')->onlyOnForms(),
            TextareaField::new('description')->onlyOnForms(),
            VichImageField::new('imageFile')->onlyOnForms(),
        ];
    }
}
