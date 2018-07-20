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
     */
    public function create_menu(Request $request, ObjectManager $manager)
    {
        $menu = new Menu();
        
        $form = $this->createFormBuilder($menu)

                     ->add('nom', TextType::class, [
                         'attr' => [
                             'placeholder' => 'Nom du Menu'
                         ]
                     ])

                     ->add('prix', TextType::class, [
                        'attr' => [
                            'placeholder' => 'Prix €'
                        ]
                     ])

                     ->add('image', TextType::class, [
                        'attr' => [
                            'placeholder' => 'Image'
                        ]
                     ])

                     ->add('description', TextareaType::class, [
                        'attr' => [
                            'placeholder' => 'Description'
                        ]
                     ])
                     ->getForm();

        return $this->render('menu/create.html.twig', [
            'formMenu' => $form->createView()
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
