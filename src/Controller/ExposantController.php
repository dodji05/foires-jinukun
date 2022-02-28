<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExposantController extends AbstractController
{
    /**
     * @Route("/les-exposants", name="app_exposant")
     */
    public function index(): Response
    {
        return $this->render('exposant/index.html.twig', [

        ]);
    }

}
