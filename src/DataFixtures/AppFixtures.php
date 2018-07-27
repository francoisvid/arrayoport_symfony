<?php

namespace App\DataFixtures;

use App\Entity\Cours;
use App\Entity\Theme;
use App\Entity\Exercice;
use App\Entity\Resultat;
use App\Entity\Apprenant;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $this->generateTheme($manager);
        $this->generateCours($manager);
        $this->generateExercice($manager);
        $this->generateApprenant($manager);
        $this->generateResultat($manager);
    }


    public function generateTheme($theme){

        $theme->persist(new Theme("html"));
        $theme->persist(new Theme("css"));
        $theme->persist(new Theme("php"));
        $theme->persist(new Theme("js"));
        $theme->persist(new Theme("jquery"));
        $theme->persist(new Theme("java"));


        $theme->flush();
    }
            
    public function generateCours($em){

        for($i = 1; $i <= 50; $i++){
            $cours = new Cours();
            $cours->setNom("Le titre N°".$i)
                  ->setContenu("Lorem, ipsum dolor sit amenisi earum, explicabo maiores harum, optio velit. Quia, corrupti aperiam?")
                  ->setTheme($em->find(Theme::class, random_int(1, 5)));

            $em->persist($cours);
        
        }
        $em->flush();
    }

    public function generateExercice($exo){

        for($i = 1; $i <=1000; $i++){
            $exercice = new Exercice();
            $exercice->setCours($exo->find(Cours::class, random_int(1, 50)))
                     ->setNom("Exercice N°".$i);

            $exo->persist($exercice);

        }
            $exo->flush();
    }

    public function generateApprenant($eleve){

        for($i = 1; $i < 100; $i++){
            $apprenant = new Apprenant();
            $apprenant->setNom("Nom" .$i)
                      ->setPrenom("Prenom" .$i)
                      ->setEmail("Email" .$i);
            $eleve->persist($apprenant);
        }
            $eleve->flush();
    }

    public function generateResultat($result){
    
        for($i = 1; $i < 10000; $i++){
            $resultat = new Resultat();
            $resultat->setApprenant($result->find(Apprenant::class, random_int(1, 100)))
                     ->setExercice($result->find(Exercice::class, random_int(1, 50)))
                     ->setNote(random_int(1, 10));

            $result->persist($resultat);
        }
            $result->flush();
    }

}

