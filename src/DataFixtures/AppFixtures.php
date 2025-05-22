<?php
namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Doctor;
use ApiPlatform\ApiResource;
use App\Repository\DoctorRepository;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager) : void 
    {
        $faker = Factory::create('fr_FR');
        for ($i = 0; $i < 30; $i++) {
            $doctor = new Doctor();
            $doctor
                ->setFirstname($faker->firstName())
                ->setLastname($faker->lastName())
                ->setSpeciality($faker->jobTitle())
                ->setAddress($faker->streetAddress())
                ->setCity($faker->city())
                ->setZip($faker->postcode())
                ->setPhone($faker->phoneNumber())
            ;
            
            $manager->persist($doctor);
        }
        $manager->flush();
    }

}