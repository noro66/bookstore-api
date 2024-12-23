<?php

namespace App\DataFixtures;

use App\Story\DefaultAuthorsStory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        DefaultAuthorsStory::load();
//        $manager->flush();
    }
}
