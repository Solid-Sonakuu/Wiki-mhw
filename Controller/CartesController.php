<?php

namespace App\Controller;

use App\Entity\Cartes;
use App\Form\CartesType;
use App\Repository\CartesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

/**
 * @Route("/cartes")
 */
class CartesController extends AbstractController
{
    /**
     * @Route("/", name="cartes_index", methods={"GET"})
     */
    public function index(CartesRepository $cartesRepository): Response
    {
        return $this->render('cartes/index.html.twig', [
            'cartes' => $cartesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="cartes_new", methods={"GET","POST"})
     */
    public function new(Request $request, SluggerInterface $slugger): Response
    {
        $carte = new Cartes();
        $form = $this->createForm(CartesType::class, $carte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //Récupération des images transmises 
            $images = $form->get('images')->getData();

            if ($images) {
                $originalFilename = pathinfo($images->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$images->guessExtension();

                // Move the file to the directory where brochures are stored
                try {
                    $images->move(
                        $this->getParameter('images_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                // updates the 'brochureFilename' property to store the PDF file name
                // instead of its contents
                $carte->setImages($newFilename);
            }

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($carte);
            $entityManager->flush();

            return $this->redirectToRoute('cartes_index');
        }

        return $this->render('cartes/new.html.twig', [
            'carte' => $carte,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="cartes_show", methods={"GET"})
     */
    public function show(Cartes $carte): Response
    {
        return $this->render('cartes/show.html.twig', [
            'carte' => $carte,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="cartes_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Cartes $carte): Response
    {
        $form = $this->createForm(CartesType::class, $carte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cartes_index');
        }

        return $this->render('cartes/edit.html.twig', [
            'carte' => $carte,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="cartes_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Cartes $carte): Response
    {
        if ($this->isCsrfTokenValid('delete'.$carte->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($carte);
            $entityManager->flush();
        }

        return $this->redirectToRoute('cartes_index');
    }
}
