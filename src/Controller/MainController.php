<?php

namespace App\Controller;

use App\Repository\ClothesRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(ClothesRepository $repo)
    {
        $clothes = $repo->findAll();

        return $this->render('main/index.html.twig', [
            'clothes' => $clothes
        ]);
    }
}
