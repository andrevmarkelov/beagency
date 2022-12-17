<?php

namespace App\Controller;

use App\Entity\Subscribers;
use App\Form\SubscribersFormType;
use App\Repository\SubscribeBlockRepository;
use App\Repository\SubscribersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SubscribersController extends AbstractController
{
    #[Route('/subscribers', name: 'app_subscribers')]
    public function index(Request $request, SubscribersRepository $subRepository): Response
    {
        $subscriber = new Subscribers();
        $form = $this->createForm(SubscribersFormType::class, $subscriber);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $subscriber = $form->getData();

            if ($subscriber instanceof Subscribers) {
                $isValidEmail = $subRepository->findOneBy(['email' => $subscriber->getEmail()]);
                if (!$isValidEmail) {
                    $subRepository->save($subscriber, true);
                    return $this->json('Ok', 200);
                }
                return $this->json('This email is already registered!', 400);
            }
        }

        return $this->json('Error', 400);
    }

    /**
     * Subscription block rendering
     *
     * @param SubscribeBlockRepository $subscribeBlockItem
     * @return Response
     */
    public function renderSubscriberForm(SubscribeBlockRepository $subscribeBlockItem)
    {
        $subscriber = new Subscribers();
        $form = $this->createForm(SubscribersFormType::class, $subscriber, ['action' => $this->generateUrl('app_subscribers'), 'attr' => ['id' => 'subscriberForm']]);

        $subscribeBlock = $subscribeBlockItem->findOneBy(['id' => 1]);

        return $this->render('subscribers/index.html.twig', [
            'subscribers_form' => $form->createView(),
            'subscribeBlock' => $subscribeBlock
        ]);
    }
}
