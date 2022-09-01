<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {        
        $categories = ['high-tech', 'vêtements', 'électroménager', 'art de la table'];

        for ($i = 0; $i <= 20; $i++) {
            $product = new Category();
            $productCategory = $categories[array_rand($categories)];
            $product->setName($productCategory);
            $product->setSlug(
                str_replace( 
                    ' ', 
                    '-', 
                    \Transliterator::create('NFD; [:Nonspacing Mark:] Remove; NFC')->transliterate($productCategory)
                )
            );
            $manager->persist($product);
        }

        $manager->flush();
    }
}
