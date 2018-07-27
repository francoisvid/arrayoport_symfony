<?php

namespace App\Controller;

use App\Entity\Menu;
use App\Repository\MenuRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{

    /**
     * @Route("/admin", name="admin")
     */
    public function get_menu(Menu $menu = null, MenuRepository $repo)
    {
        $menus = $repo->findAll();
        return $this->render('admin/index.html.twig', [
            'menus' => $menus
        ]);
    }
}
