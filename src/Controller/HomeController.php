<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('', name: 'home')]
    public function index(): Response
    {
        if ($this->isGranted('ROLE_ADMIN')) {

            return $this->render('welcome/index.html.twig', [
                'controller_name' => 'HomeController',
            ]);
        } else {
            return $this->render('xfront_office/index.html.twig', [
                'controller_name' => 'HomeController',
            ]);

        }

    }
}
