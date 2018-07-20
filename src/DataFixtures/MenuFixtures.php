<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Menu;


class MenuFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i = 1; $i<2; $i++){
            $menu = new Menu();
            $menu->setNom("Menu Classique");
            $menu->setPrix(19.90);
            $menu->setImage("http://placehold.it/300x300");
            $menu->setDescription("Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab deserunt delectus quasi modi qui consequuntur rem, saepe provident earum ex, at ea quidem quo accusantium doloribus porro debitis accusamus magni!");
            $menu->setStatut(1);

            $manager->persist($menu);
        }

        for($i = 1; $i<2; $i++){
            $menu = new Menu();
            $menu->setNom("Menu Bambino");
            $menu->setPrix(14.90);
            $menu->setImage("http://placehold.it/300x300");
            $menu->setDescription("Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab deserunt delectus quasi modi qui consequuntur rem, saepe provident earum ex, at ea quidem quo accusantium doloribus porro debitis accusamus magni!");
            $menu->setStatut(1);

            $manager->persist($menu);
        }

        for($i = 1; $i<2; $i++){
            $menu = new Menu();
            $menu->setNom("Menu Carni");
            $menu->setPrix(24.90);
            $menu->setImage("http://placehold.it/300x300");
            $menu->setDescription("Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab deserunt delectus quasi modi qui consequuntur rem, saepe provident earum ex, at ea quidem quo accusantium doloribus porro debitis accusamus magni!");
            $menu->setStatut(1);

            $manager->persist($menu);
        }

        for($i = 1; $i<2; $i++){
            $menu = new Menu();
            $menu->setNom("Menu SteackHouse");
            $menu->setPrix(19.90);
            $menu->setImage("http://placehold.it/300x300");
            $menu->setDescription("Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab deserunt delectus quasi modi qui consequuntur rem, saepe provident earum ex, at ea quidem quo accusantium doloribus porro debitis accusamus magni!");
            $menu->setStatut(1);

            $manager->persist($menu);
        }

        for($i = 1; $i<2; $i++){
            $menu = new Menu();
            $menu->setNom("Menu Veggie");
            $menu->setPrix(19.90);
            $menu->setImage("http://placehold.it/300x300");
            $menu->setDescription("Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab deserunt delectus quasi modi qui consequuntur rem, saepe provident earum ex, at ea quidem quo accusantium doloribus porro debitis accusamus magni!");
            $menu->setStatut(1);

            $manager->persist($menu);
        }

        for($i = 1; $i<2; $i++){
            $menu = new Menu();
            $menu->setNom("Menu Healthy");
            $menu->setPrix(15.90);
            $menu->setImage("http://placehold.it/300x300");
            $menu->setDescription("Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab deserunt delectus quasi modi qui consequuntur rem, saepe provident earum ex, at ea quidem quo accusantium doloribus porro debitis accusamus magni!");
            $menu->setStatut(1);

            $manager->persist($menu);
        }
        $manager->flush();
    }
}
