<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AcceuilController extends AbstractController
{
    #[Route('/acceuil', name: 'app_acceuil')]
    public function index(ProductRepository $repository): Response
    {

        $featuredProducts = $repository->findBy(['featured' => true]);

        // $nomEntreprise = "Zen & Aroma";
        return $this->render('acceuil/index.html.twig', [
            "featuredProducts" => $featuredProducts,
        ]);
    }
}
