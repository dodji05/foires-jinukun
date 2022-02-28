<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    /**
     * @Route("/", name="app_accueil")
     */
    public function accueil (Request $request){
        return $this->render('accueil/index.html.twig');
    }

  /**
   * @Route("/a-propos", name="about")
   */
  public function about()
  {
      return $this->render('accueil/about.html.twig');
  }

    /**
     * @Route("/contact", name="contact")
     */
    public function contact()
    {
        return $this->render('accueil/contact.html.twig');
    }
}