<?php

namespace App\Controller\Admin;

use App\Admin\Field\CKEditorField;
use App\Admin\Field\VichImageField;
use App\Entity\Services;
use App\Form\ServicesItemBottomTextType;
use App\Form\ServicesItemCountingType;
use App\Form\ServicesItemImageBlockType;
use App\Form\ServicesItemTextBlockType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ServicesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Services::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title'),
            SlugField::new('slug')->setTargetFieldName('title')->onlyOnForms(),
            TextareaField::new('shortDescription'),
            CKEditorField::new('description')->onlyOnForms(),
            VichImageField::new('imageFile')->onlyOnForms(),
            TextField::new('titleTextBlock')->onlyOnForms(),
            CollectionField::new('textBlock')->setEntryType(ServicesItemTextBlockType::class)->setFormTypeOption('by_reference', false),
            CollectionField::new('imageBlock')->setEntryType(ServicesItemImageBlockType::class)->setFormTypeOption('by_reference', false),
            CollectionField::new('CountingBlock')->setEntryType(ServicesItemCountingType::class)->setFormTypeOption('by_reference', false),
            CollectionField::new('bottomText')->setEntryType(ServicesItemBottomTextType::class)->setFormTypeOption('by_reference', false)
        ];

    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->addFormTheme('@FOSCKEditor/Form/ckeditor_widget.html.twig')
            ;
    }
}
