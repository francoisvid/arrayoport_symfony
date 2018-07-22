<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use App\Entity\Menu;
use App\Repository\MenuRepository;

class MenuController extends Controller
{

    /**
     * @Route("/carte/menu/create", name="create")
     * @Route("/carte/menu/{id}/edit", name="edit")
     */
    public function menu(Menu $menu = null, Request $request, ObjectManager $manager)
    {
        if(!$menu){
            $menu = new Menu();
        }
        
        $form = $this->createFormBuilder($menu)
                     ->add('nom')
                     ->add('prix')
                     ->add('image')
                     ->add('description')
                     ->add('statut')
                     ->getForm();
                     
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $manager->persist($menu);
            $manager->flush();

            return $this->redirectToRoute('menu', ['id' => $menu->getId()]);
        }
            return $this->render('menu/create.html.twig', [
                'formMenu' => $form->createView(),
                'editMenu' => $menu->getId() !== null
                ]);

    }

    /**
     * @Route("/carte/menu/{id}", name="menu")
     */
    public function get_menu_id(Menu $menu)
    {
        return $this->render('menu/menu.html.twig', [
            'menu' => $menu
        ]);
    }


}
