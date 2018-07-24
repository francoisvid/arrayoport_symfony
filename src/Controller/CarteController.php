<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CarteController extends Controller
{
    /**
     * @Route("/carte", name="carte")
     */
    public function index()
    {
        return $this->render('carte/index.html.twig', [
            'controller_name' => 'CarteController',
        ]);
    }
}
