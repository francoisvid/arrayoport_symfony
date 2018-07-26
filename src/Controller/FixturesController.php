<?php

namespace App\Controller;

use App\Entity\Theme;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class FixturesController extends Controller
{
    /**
     * @Route("/fixtures", name="fixtures")
     */
    public function index(){
        
        $this->generateCours();
        $this->generateThemes();

        return new Response();
    }

    /**
     * @Route("/themes")
     */
    public function themes(){
        $themes = $this->getDoctrine->getRepository(Theme::class)->findAll();
        $moyennes = array();

        foreach($themes as $theme)
        {
            $moyennes[$theme->getNom()] = array();

        }

    }

    



    // /**
    //  * @Route("/themes", name="themes")
    //  */
    // public function get_themes(){

    //     $em = $this->getDoctrine()->getManager();
    //     $themes = $em->getRepository(Theme::class)->findAll();
    //     return $this->render('fixtures/index.html.twig', [
    //         'themes' => $themes
    //     ]);
    // }
}
