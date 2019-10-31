<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Pays;
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
        $admin = new User();
        $admin->setLogin('admin');
        $admin->setRoles(['ROLE_ADMIN']);
        $password = $this->encoder->encodePassword($admin, 'Admin_test');
        $admin->setPassword($password);
        $manager->persist($admin);
        $manager->flush();

        //utilisateur

        $user = new User();
        $user->setLogin('user');
        //$user = setRoles('ROLE_USER');
        $password = $this->encoder->encodePassword($user, 'User_test');
        $user->setPassword($password);
        $manager->persist($user);
        $manager->flush();

        // Faker

        // $faker = Faker\Factory::create();
        //     echo $faker->name;

        // pays

        if (($paysFile = fopen(__DIR__ . "/../../data/ListeDePays.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($paysFile)) !== FALSE) {
                $pays = new Pays();
                $pays->setNom($data[0]);
                $manager->persist($pays);
            }

            fclose($paysFile);
        }
        $manager->flush();
    }
}