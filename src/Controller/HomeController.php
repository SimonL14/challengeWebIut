<?php

namespace App\Controller;

use App\Entity\Event;
use Doctrine\ORM\Mapping\Id;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $event = $doctrine->getRepository(Event::class)->findAll();
        $events = (array) $event;

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'event' => $events,
        ]);
    }

    #[Route('/mention', name: 'app_mention')]
    public function mention(): Response
    {
        return $this->render('mention/mention.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/myaccount', name: 'app_account')]
    public function account(ManagerRegistry $doctrine, TokenStorageInterface $tokenStorage): Response
    {
        $user = $this->getUser();
        $events = $user->getUserEvent();

        return $this->render('account/account.html.twig', [
            'controller_name' => 'HomeController',
            'events' => $events
        ]);
    }
    
}
