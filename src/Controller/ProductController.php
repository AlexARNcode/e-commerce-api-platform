<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/product/{slug}', name: 'product')]
    public function index(string $slug, ProductRepository $productRepository): Response
    {
        $product = $productRepository->findOneBy(["slug" => $slug]);

        return $this->render('product/index.html.twig', [
            'product' => $product,
        ]);
    }
}
