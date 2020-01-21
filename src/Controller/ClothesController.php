<?php

namespace App\Controller;

use App\Entity\Clothes;
use App\Form\ClothesType;
use App\Repository\ClothesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/clothes")
 */
class ClothesController extends AbstractController
{
    /**
     * @Route("/", name="clothes_index", methods={"GET"})
     */
    public function index(ClothesRepository $clothesRepository): Response
    {
        return $this->render('clothes/index.html.twig', [
            'clothes' => $clothesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="clothes_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $clothes = new Clothes();
        $form = $this->createForm(ClothesType::class, $clothes);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($clothes);
            $entityManager->flush();

            return $this->redirectToRoute('clothes_index');
        }

        return $this->render('clothes/new.html.twig', [
            'clothes' => $clothes,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="clothes_show", methods={"GET"})
     */
    public function show(Clothes $clothes): Response
    {
        return $this->render('clothes/show.html.twig', [
            'clothes' => $clothes,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="clothes_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Clothes $clothes): Response
    {
        $form = $this->createForm(ClothesType::class, $clothes);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('clothes_index');
        }

        return $this->render('clothes/edit.html.twig', [
            'clothes' => $clothes,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="clothes_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Clothes $clothes): Response
    {
        if ($this->isCsrfTokenValid('delete'.$clothes->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($clothes);
            $entityManager->flush();
        }

        return $this->redirectToRoute('clothes_index');
    }
}
