<?php

namespace App\Controller\Admin;

use App\Entity\AboutItem;
use App\Entity\ContactForm;
use App\Entity\FactBlock;
use App\Entity\Faq;
use App\Entity\FormPage;
use App\Entity\IndexServices;
use App\Entity\Offer;
use App\Entity\Page;
use App\Entity\PageSettings;
use App\Entity\Partners;
use App\Entity\Services;
use App\Entity\SubscribeBlock;
use App\Entity\Subscribers;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
         return $this->render('Admin/index.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Beagency');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::subMenu('Pages CMS', 'fa fa-folder')->setSubItems([
            MenuItem::linkToCrud('Page', 'fa fa-list', Page::class),
            MenuItem::linkToCrud('Partners', 'fa fa-list', Partners::class),
            MenuItem::linkToCrud('Offer', 'fa fa-list', Offer::class),
            MenuItem::linkToCrud('Home Page Services', 'fa fa-list', IndexServices::class),
            MenuItem::linkToCrud('Fact Block', 'fa fa-list', FactBlock::class),
            MenuItem::linkToCrud('Subscriber', 'fa fa-list', SubscribeBlock::class),
            MenuItem::linkToCrud('About Items', 'fa fa-list', AboutItem::class),
            MenuItem::linkToCrud('FAQ', 'fa fa-list', Faq::class),
            MenuItem::linkToCrud('Contact Form', 'fa fa-list', FormPage::class)
        ]);

        yield MenuItem::linkToCrud('Services', 'fa fa-cog', Services::class);
        yield MenuItem::linkToCrud('Settings', 'fa fa-bookmark', PageSettings::class);
        yield MenuItem::section('Forms');
        yield MenuItem::linkToCrud('Subscribers', 'fa fa-users', Subscribers::class);
        yield MenuItem::linkToCrud('Messages', 'fa fa-envelope', ContactForm::class);
    }
}
