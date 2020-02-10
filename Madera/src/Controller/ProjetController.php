<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/projet")
 */
class ProjetController extends AbstractController
{
    /**
     * @Route("/liste", name="liste_projet")
     */
    public function index()
    {
        return $this->render('projet/listeProjet.html.twig');
    }
}
