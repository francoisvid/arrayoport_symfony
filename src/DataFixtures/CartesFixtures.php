<?php

namespace App\DataFixtures;

use App\Entity\Carte;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CartesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');

        for($i = 1; $i <= 3; $i++)
        {
            $carte = new Carte();
            $carte->setNom($faker->name())
                  ->setImage($faker->imageUrl($width = 300, $height = 300))
                  ->setDescription($faker->paragraph())
                  ->setCreatedAt($faker->dateTimeBetween('-6 months'))
                  ->setStatut(1);

            $manager->persist($carte);
        }

        $manager->flush();
    }
}
