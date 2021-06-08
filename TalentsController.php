<?php

namespace App\Controller;

use App\Entity\Talents;
use App\Form\TalentsType;
use App\Repository\TalentsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/talents")
 */
class TalentsController extends AbstractController
{
    /**
     * @Route("/", name="talents_index", methods={"GET"})
     */
    public function index(TalentsRepository $talentsRepository): Response
    {
        return $this->render('talents/index.html.twig', [
            'talents' => $talentsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="talents_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $talent = new Talents();
        $form = $this->createForm(TalentsType::class, $talent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($talent);
            $entityManager->flush();

            return $this->redirectToRoute('talents_index');
        }

        return $this->render('talents/new.html.twig', [
            'talent' => $talent,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="talents_show", methods={"GET"})
     */
    public function show(Talents $talent): Response
    {
        return $this->render('talents/show.html.twig', [
            'talent' => $talent,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="talents_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Talents $talent): Response
    {
        $form = $this->createForm(TalentsType::class, $talent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('talents_index');
        }

        return $this->render('talents/edit.html.twig', [
            'talent' => $talent,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="talents_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Talents $talent): Response
    {
        if ($this->isCsrfTokenValid('delete'.$talent->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($talent);
            $entityManager->flush();
        }

        return $this->redirectToRoute('talents_index');
    }
}
