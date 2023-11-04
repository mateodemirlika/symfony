<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Movie;

class MovieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $movie = new Movie();
        $movie->setTitle('The Dark Knight');
        $movie->setReleaseYear(2008);
        $movie->setDescription('This is description of The Dark Knight');
        $movie->setImagePath('https://cdn.pixabay.com/photo/2020/05/15/16/42/batman-5174224_1280.jpg');

        //ADD DATA TO PIVOT TABLE
        $movie->addActor($this->getReference('actor_1'));
        $movie->addActor($this->getReference('actor_2'));

        $manager->persist($movie);

        $movie2 = new Movie();
        $movie2->setTitle('Avenger');
        $movie2->setReleaseYear(2019);
        $movie2->setDescription('This is description Avenger');
        $movie2->setImagePath('https://cdn.pixabay.com/photo/2021/03/06/17/09/mjollnir-6074194_1280.jpg');
        //ADD DATA TO PIVOT TABLE
        $movie2->addActor($this->getReference('actor_3'));
        $movie2->addActor($this->getReference('actor_4'));
        $manager->persist($movie2);

        $manager->flush();
    }
}
