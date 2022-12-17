<?php

namespace App\Controller\Admin;

use App\Admin\Field\VichImageField;
use App\Entity\Offer;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class OfferCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Offer::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title'),
            VichImageField::new('imageFile')->onlyOnForms(),
            TextareaField::new('description'),
            CollectionField::new('items')->setEntryType(TextType::class)->onlyOnForms(),
            TextField::new('buttonTitle')->onlyOnForms(),
            UrlField::new('buttonLink')->onlyOnForms()
        ];
    }
}
