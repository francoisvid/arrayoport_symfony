<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller; 

class CarteController extends Controller
{
    /**
     * @Route("/carte", name="carte")
     */
    public function get_carte()
    {
        return $this->render('carte/index.html.twig', [
            'controller_name' => 'CarteController',
            'classique' => 'La classique',
            'carnivore' => 'La carnivore',
            'vegetarienne' => 'La végétarienne',
        ]);
    }

    /**
     * @Route("/carte_id/11", name="carte_id")
     */
    public function get_carte_id()
    {
        return $this->render('carte_id/index.html.twig', [
            'classique' => 'La classique',
            'carnivore' => 'La carnivore',
            'vegetarienne' => 'La végétarienne',
        ]);
    }



}
