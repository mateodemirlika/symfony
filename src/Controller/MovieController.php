<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\MovieRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Movie;


class MovieController extends AbstractController
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    #[Route('/movie', name: 'app_movie')]
    public function index(): Response
    {
        //findAll -> SELECT * FROM movies;

        //find() -> SELECT * FROM movies WHERE id = 7;

        //findBy() -> SELECT * FROM movies ORDER BY id DESC;

        //findOneBy() -> SELECT * FROM movies WHERE id = 7 AND title = 'The Dark Knight' ORDER BY id DESC;


        $repository = $this->em->getRepository(Movie::class);

        $movies = $repository->getClassName();

        dd($movies);

        return $this->render('movie/index.html.twig');
    }

}
