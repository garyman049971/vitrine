<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AcceuilController extends AbstractController
{
    #[Route('/acceuil', name: 'app_acceuil')]
    public function index(): Response
    {
        // $nomEntreprise = "Zen & Aroma";
        return $this->render('acceuil/index.html.twig', [
            'controller_name' => 'AcceuilController',
            // 'nom_entreprise' => $nomEntreprise,
        ]);
    }
}
