<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;

class Usuario extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $usuario = new User();
        $usuario->setUsername('admin');
        $usuario->setPassword('$2a$10$LAiSZi30tTpCpYvJ9uqtwOSlAc7b7Cm4PrDsmsdMqNA4IoBwjQHDm');
        $usuario->setEmail('admin@admin.com');
        $manager->persist($usuario);
        $manager->flush();
    }
}
