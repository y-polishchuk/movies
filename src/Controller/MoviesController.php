<?php

namespace App\Controller;

use App\Entity\Movie;
use App\Repository\MovieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MoviesController extends AbstractController
{
    private $movieRepository;

    public function __construct(MovieRepository $movieRepository)
    {
        $this->movieRepository = $movieRepository;
    }

    #[Route('/movies', methods: ['GET'], name: 'movies')]
    public function index(): Response
    {
        return $this->render('movies/index.html.twig', [
            'movies' => $this->movieRepository->findAll(),
        ]);
    }

    #[Route('/movies/{id}', methods: ['GET'], name: 'movies')]
    public function show($id): Response
    {
        return $this->render('movies/show.html.twig', [
            'movie' => $this->movieRepository->find($id),
        ]);
    }
}
