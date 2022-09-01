<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProductFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i <= 20; $i++) {
            $product = new Product();
            $product->setTitle("Produit $i");
            $product->setPrice(mt_rand(100,1000));
            $product->setDescription("Ceci est la description du produit $i");
            $product->setImage("https://picsum.photos/id/$i/200");
            $product->setSlug("produit-$i");
            $manager->persist($product);
        }

        $manager->flush();
    }
}
