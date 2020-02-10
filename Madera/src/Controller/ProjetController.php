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

    /**
     * @Route("/add", name="add_projet")
     */
    public function addProjet()
    {
        return $this->render('projet/addProjet.html.twig');
    }

    /**
     * @Route("/{id}/delete", name="delete_projet")
     */
    public function deleteProjet($id)
    {
        return $this->render('projet/listeProjet.html.twig');
    }

    /**
     * @Route("/{id}/update", name="update_projet")
     */
    public function updateProjet($id){
        return $this->render('projet/showCProjet.html.twig');
    }
}
