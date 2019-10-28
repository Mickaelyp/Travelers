<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{   
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
    $this->encoder = $encoder;
    }
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        // admin
        $user = new User();
        $user->setLogin('admin');
        $user->setRoles(['ROLE_ADMIN']);
        $password = $this->encoder->encodePassword($user, 'Admin_test');
        $user->setPassword($password);
        $manager->persist($user);
        $manager->flush();

        //utilisateur

        $user = new User();
        $user->setLogin('user');
        $user = setRoles('ROLE_USER');
        $password = $this->encoder->encodePassword($user, 'User_test');
        $user->setPassword($password);
        $manager->persist($user);
        $manager->flush();

        // Faker

        $faker = Faker\Factory::create();
            echo $faker->name;

        // Création pays

        
            
    }
}
