<?php

namespace App\Controller\Admin;

use App\Entity\AboutItem;
use App\Entity\ContactForm;
use App\Entity\Faq;
use App\Entity\FormPage;
use App\Entity\IndexServices;
use App\Entity\Offer;
use App\Entity\Page;
use App\Entity\Partners;
use App\Entity\Services;
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
        yield MenuItem::linkToCrud('Services', 'fa fa-folder-o', Services::class);
        yield MenuItem::linkToCrud('Offer', 'fa fa-folder-o', Offer::class);
        yield MenuItem::linkToCrud('Page', 'fa fa-folder-o', Page::class);
        yield MenuItem::linkToCrud('Partners', 'fa fa-folder-o', Partners::class);
        yield MenuItem::linkToCrud('About Items', 'fa fa-folder-o', AboutItem::class);
        yield MenuItem::linkToCrud('Index services', 'fa fa-folder-o', IndexServices::class);
        yield MenuItem::linkToCrud('FAQ', 'fa fa-folder-o', Faq::class);
        yield MenuItem::linkToCrud('Contact Form', 'fa fa-folder-o', FormPage::class);
        yield MenuItem::linkToCrud('Subscribers', 'fa fa-folder-o', Subscribers::class);
        yield MenuItem::linkToCrud('Messages', 'fa fa-folder-o', ContactForm::class);
    }
}
