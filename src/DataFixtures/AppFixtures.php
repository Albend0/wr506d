<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Actor;
use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \Xylis\FakerCinema\Provider\Person($faker));

        $fullActorName = $faker->actor;

        list($firstName, $lastName) = explode(' ', $fullActorName, 2);

        $actor = new Actor();
        $actor->setLastname($lastName);
        $actor->setFirstname($firstName);
        $actor->setDateOfBirth(new \DateTimeImmutable('1980-01-01'));
        $actor->setCreatedAt(new \DateTimeImmutable());
        $manager->persist($actor);
        $manager->flush();
    }
}
