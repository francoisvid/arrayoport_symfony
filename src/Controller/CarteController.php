<?php

namespace App\Controller;

use App\Entity\Carte;
use App\Repository\CarteRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CarteController extends Controller
{
    /**
     * @Route("/carte", name="carte")
     */
    public function carte(CarteRepository $repo)
    {
        $cartes = $repo->findAll();        
        return $this->render('carte/index.html.twig', [
            'controller_name' => 'CarteController',
            'cartes' => $cartes
        ]);
    }
}
