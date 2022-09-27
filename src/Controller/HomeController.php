<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\ItemInterface;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(ProductRepository $productRepository, CacheInterface $cache): Response
    {
        $products = $cache->get('all_products', function (ItemInterface $item) use ($productRepository) {
            $item->expiresAfter(20);

            sleep(3);

            return $productRepository->findAll();
        });

        return $this->render('home/index.html.twig', [
            'products' => $products,
        ]);
    }
}
