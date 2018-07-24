<?php

namespace App\Controller;

use App\Entity\Theme;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class FixturesController extends Controller
{
    // /**
    //  * @Route("/fixtures", name="fixtures")
    //  */
    // public function index()
    // {
    //     return $this->render('fixtures/index.html.twig');
    //     return new Response();
    // }


    /**
     * @Route("/fixtures", name="fixtures")
     */
    public function generateThemes()
    {
            $em = $this->getDoctrine()->getManager();
            
            $em->persist(new Theme("html"));
            $em->persist(new Theme("css"));
            $em->persist(new Theme("php"));
            $em->persist(new Theme("js"));
            $em->persist(new Theme("java"));
            $em->persist(new Theme("symfony"));
            
            $em->flush();
            
            return new Response();
    }

    /**
     * @Route("/themes", name="themes")
     */
    public function get_themes(){

        $em = $this->getDoctrine()->getManager();
        $themes = $em->getRepository(Theme::class)->findAll();
        return $this->render('fixtures/index.html.twig', [
            'themes' => $themes
        ]);
    }
}
