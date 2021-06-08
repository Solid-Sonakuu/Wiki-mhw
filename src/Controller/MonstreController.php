<?php

namespace App\Controller;

use App\Entity\Monstre;
use App\Form\MonstreType;
use App\Repository\MonstreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/monstre")
 */
class MonstreController extends AbstractController
{
    /**
     * @Route("/", name="monstre_index", methods={"GET"})
     */
    public function index(MonstreRepository $monstreRepository): Response
    {
        return $this->render('monstre/index.html.twig', [
            'monstres' => $monstreRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="monstre_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $monstre = new Monstre();
        $form = $this->createForm(MonstreType::class, $monstre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($monstre);
            $entityManager->flush();

            return $this->redirectToRoute('monstre_index');
        }

        return $this->render('monstre/new.html.twig', [
            'monstre' => $monstre,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="monstre_show", methods={"GET"})
     */
    public function show(Monstre $monstre): Response
    {
        return $this->render('monstre/show.html.twig', [
            'monstre' => $monstre,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="monstre_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Monstre $monstre): Response
    {
        $form = $this->createForm(MonstreType::class, $monstre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('monstre_index');
        }

        return $this->render('monstre/edit.html.twig', [
            'monstre' => $monstre,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="monstre_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Monstre $monstre): Response
    {
        if ($this->isCsrfTokenValid('delete'.$monstre->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($monstre);
            $entityManager->flush();
        }

        return $this->redirectToRoute('monstre_index');
    }
}
