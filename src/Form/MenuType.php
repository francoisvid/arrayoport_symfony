<?php

namespace App\Form;

use App\Entity\Menu;
use App\Entity\Carte;

use Symfony\Bridge\Doctrine\Form\type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MenuType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('carte', EntityType::class,[
                'class' => Carte::class,
                'choice_label' => 'nom'
                ])
                ->add('nom')
                ->add('image')
                ->add('description')
                ->add('statut')
                ->add('alergene')
                // ->add('created_at')
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Menu::class,
        ]);
    }
}
