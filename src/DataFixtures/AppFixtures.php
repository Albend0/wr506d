<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Actor;
use App\Entity\Movie;
use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \Xylis\FakerCinema\Provider\Person($faker));

        $actors = $faker->actors($gender = null, $count = 50, $duplicates =false);
        $createdActors = [];
        foreach ($actors as $item) {

            $fullname = $item;
            $fullnameExploded = explode(" ", $fullname);

            $firstname = $fullnameExploded[0];
            $lastname = $fullnameExploded[1];

            $actor = new Actor();
            $actor->setlastname($lastname);
            $actor->setfirstname($firstname);
            $actor->setDateOfBirth(new \DateTime());
            $actor->setCreatedAt(new \DateTimeImmutable());

            $createdActors[] = $actor;

            $manager->persist($actor);
        }

        $faker->addProvider(new \Xylis\FakerCinema\Provider\Movie($faker));
        $movies = $faker->movies(20);

        foreach ($movies as $item) {

            $movie = new Movie();
            $movie->setTitle($item);

            shuffle($createdActors);
            $createdActorsSliced = array_slice($createdActors, 0, 5);
            foreach ($createdActorsSliced as $actor) {
                $movie->addActor($actor);
            }

            $manager->persist($movie);
        }
        $manager->flush();
    }
}
