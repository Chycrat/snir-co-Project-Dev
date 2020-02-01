<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ListeProjetController extends AbstractController
{
    /**
     * @Route("/listeProjet", name="liste_projet")
     */
    public function index()
    {
        return $this->render('listeProjet.html.twig', [
            'controller_name' => 'ListeProjetController',
        ]);
    }
}
