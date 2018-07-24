<?php

namespace App\Controller;

use App\Entity\Theme;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FixturesController extends Controller
{
    /**
     * @Route("/fixtures", name="fixtures")
     */
    public function index()
    {
        return $this->render('fixtures/index.html.twig', [
            'controller_name' => 'FixturesController',
        ]);
    }

    // Création des themes
    public function generateThemes(){
        $em = $this->getDoctrine()->getManager();

        $theme = new Theme();
        $theme->setNom("html");
        $em->persist($theme);

        $theme = new Theme();
        $theme->setNom("css");
        $em->persist($theme);

        $em->flush($theme);
    }
}
