<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\User;


class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i = 1; $i < 3; $i++){
            $user = new User();
            $user->setPermission("admin");
            $user->setStatut(1);

            $manager->persist($user);
        }

        for($i = 1; $i < 3; $i++){
            $user = new User();
            $user->setPermission("utilisateur");
            $user->setStatut(1);

            $manager->persist($user);

        }
        $manager->flush();
    }
}
