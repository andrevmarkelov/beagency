<?php

namespace App\Controller\Admin;

use App\Entity\Subscribers;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;

class SubscribersCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Subscribers::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            EmailField::new('email'),
        ];
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->disable(Action::NEW)
            ;
    }
}
