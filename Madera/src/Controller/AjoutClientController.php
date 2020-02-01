<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AjoutClientController extends AbstractController
{
    /**
     * @Route("/ajoutClient", name="ajout_client")
     */
    public function index()
    {
        return $this->render('ajoutClient.html.twig', [
            'controller_name' => 'AjoutClientController',
        ]);
    }
}
