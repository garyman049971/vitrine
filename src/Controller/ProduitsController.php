<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ProduitsController extends AbstractController
{
    #[Route('/produits', name: 'app_produits')]
    public function index(ProductRepository $repository): Response
    {
        return $this->render('produits/index.html.twig', [
            "products" => $repository->findAll()
        ]);
    }
}
