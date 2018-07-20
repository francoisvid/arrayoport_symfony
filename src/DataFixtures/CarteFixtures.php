<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Carte;


class CarteFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i = 1; $i<2; $i++){
            $carte = new Carte;
            $carte->setNom("La classique");
            $carte->setImage("http://placehold.it/350x150");
            $carte->setStatut(1);
            $carte->setDescription("La classique, carte N°1 depuis 1998");

            $manager->persist($carte);
        }
        for($i = 1; $i<2; $i++){
            $carte = new Carte;
            $carte->setNom("La carnivore");
            $carte->setImage("http://placehold.it/350x150");
            $carte->setStatut(1);
            $carte->setDescription("La carnivore est faite pour toi si tu es un mordu de beef");

            $manager->persist($carte);
        }

        for($i = 1; $i<2; $i++){
            $carte = new Carte;
            $carte->setNom("La végétarienne");
            $carte->setImage("http://placehold.it/350x150");
            $carte->setStatut(1);
            $carte->setDescription("La végétarienne est faite pour toi si les proteine végétale sont un atout mageur pour toi");
        
            $manager->persist($carte);
        }
        
        $manager->flush();
    }
}
