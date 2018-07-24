<?php

namespace App\DataFixtures;

use App\Entity\Menu;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class MenuFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');
            
        for($i= 1; $i<=7; $i++)
        {
            $menu = new Menu();
            $menu->setNom($faker->name())
                 ->setImage($faker->imageUrl($width = 300, $height = 300))
                 ->setDescription($faker->paragraph())
                 ->setStatut(1)
                 ->setAlergene($faker->name());
                //  ->setCreated_at($faker->dateTimeBetween('-6 months'));
                //  ->setCarte(1);
    
            $manager->persist($menu);
            }

        $manager->flush();
    }
}