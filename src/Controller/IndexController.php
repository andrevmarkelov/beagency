<?php

namespace App\Controller;

use App\Entity\ContactForm;
use App\Entity\Services;
use App\Form\ContactFormType;
use App\Repository\AboutItemRepository;
use App\Repository\FaqRepository;
use App\Repository\FormPageRepository;
use App\Repository\IndexServicesRepository;
use App\Repository\OfferRepository;
use App\Repository\PageRepository;
use App\Repository\PartnersRepository;
use App\Repository\ServicesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index(PageRepository $pageInfo, OfferRepository $offerItem, PartnersRepository $partnersItem, IndexServicesRepository $servicesItems): Response
    {
        // 0 - home page
        // 1 - about us page
        // 2 - service page
        // 3 - faq page
        // 4 - contact page
        $page = $pageInfo->findOneBy(['uuid' => 0]);
        $offer = $offerItem->findAll();
        $partners = $partnersItem->findAll();
        $services = $servicesItems->findOneBy(['id' => 1]);

        return $this->render('index/index.html.twig', [
            'page' => $page,
            'offer' => $offer,
            'partners' => $partners,
            'services' => $services
        ]);
    }

    /**
     * About Us page
     *
     * @param PageRepository $pageInfo
     * @param AboutItemRepository $aboutItem
     * @return Response
     */
    #[Route('/about', name: 'about')]
    public function about(PageRepository $pageInfo, AboutItemRepository $aboutItem): Response
    {
        $page = $pageInfo->findOneBy(['uuid' => 1]);
        $items = $aboutItem->findAll();

        return $this->render('index/about.html.twig', [
            'page' => $page,
            'aboutItem' => $items
        ]);
    }

    /**
     * Service page
     *
     * @param PageRepository $pageInfo
     * @param ServicesRepository $servicesItem
     * @return Response
     */
    #[Route('/services', name: 'services')]
    public function services(PageRepository $pageInfo, ServicesRepository $servicesItem): Response
    {
        $page = $pageInfo->findOneBy(['uuid' => 2]);
        $services = $servicesItem->findAll();

        return $this->render('index/services.html.twig', [
            'page' => $page,
            'services' => $services
        ]);
    }

    /**
     * FAQ Page
     *
     * @param PageRepository $pageInfo
     * @param FaqRepository $faqItem
     * @return Response
     */
    #[Route('/faq', name: 'faq')]
    public function faqPage(PageRepository $pageInfo, FaqRepository $faqItem): Response
    {
        $page = $pageInfo->findOneBy(['uuid' => 3]);
        $faq = $faqItem->findAll();

        return $this->render('index/faq.html.twig', [
            'page' => $page,
            'faq' => $faq
        ]);
    }

    /**
     * Services detail
     *
     * @param Services $services
     * @return Response
     */
    #[Route('/services/{slug}', name: 'services_detail')]
    public function servicesDetail(Services $services): Response
    {

        return $this->render('index/services_detail.html.twig', [
            'controller_name' => 'Services detail Page',
            'title' => $services->getTitle(),
            'imageName' => $services->getImageName(),
            'description' => $services->getDescription(),
            'titleTextBlock' => $services->getTitleTextBlock(),
            'textBlock' => $services->getTextBlock(),
            'imageBlock' => $services->getImageBlock(),
            'countBlock' => $services->getCountingBlock(),
            'bottomText' => $services->getBottomText()
        ]);
    }

    /**
     * Contact Page
     *
     * @param PageRepository $pageInfo
     * @param FormPageRepository $formPage
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    #[Route('/contacts', name: 'contacts')]
    public function contacts(PageRepository $pageInfo, FormPageRepository $formPage, Request $request, EntityManagerInterface $entityManager): Response
    {
        $page = $pageInfo->findOneBy(['uuid' => 4]);
        $formPageContent = $formPage->findOneBy(['id' => 1]);

        $message = new ContactForm();
        $form = $this->createForm(ContactFormType::class, $message, ['attr' => ['id' => 'contactForm']]);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $message = $form->getData();

            if ($message instanceof ContactForm) {
                $entityManager->persist($message);
                $entityManager->flush();
                return $this->json('Ok', 200);
            }

            return $this->json('Error', 400);
        }

        return $this->render('index/contacts.html.twig', [
            'page' => $page,
            'formPageContent' => $formPageContent,
            'contact_form' => $form->createView()
        ]);
    }
}
