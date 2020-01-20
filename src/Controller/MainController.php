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
        $products = $repo->findAll();
        dump($products);

        return $this->render('main/index.html.twig', [
            'products' => $products,
        ]);
    }
}
