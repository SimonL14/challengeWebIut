<?php

namespace App\Controller;

use App\Entity\Event;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

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
}
