<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
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
    public function account(): Response
    {
        return $this->render('account/account.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}