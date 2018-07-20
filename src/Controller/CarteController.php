<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller; 
use App\Entity\Carte;
use App\Repository\CarteRepository;

class CarteController extends Controller
{
    /**
     * @Route("/carte", name="carte")
     */
    public function get_carte(CarteRepository $repo)
    {
        $cartes = $repo->findAll();        
        return $this->render('carte/index.html.twig', [
            'controller_name' => 'CarteController',
            'cartes' => $cartes,
        ]);
    }

}
