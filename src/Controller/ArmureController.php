<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ArmureController extends AbstractController
{
    /**
     * @Route("/armure", name="armure")
     */
    public function index()
    {
        return $this->render('armure/index.html.twig', [
            'controller_name' => 'ArmureController',
        ]);
    }
}
