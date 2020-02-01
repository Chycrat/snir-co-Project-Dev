<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ListePlanController extends AbstractController
{
    /**
     * @Route("/listePlan", name="liste_plan")
     */
    public function index()
    {
        return $this->render('listePlan.html.twig', [
            'controller_name' => 'ListePlanController',
        ]);
    }
}
