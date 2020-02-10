<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/plan")
 */
class PlanController extends AbstractController
{
    /**
     * @Route("/liste", name="liste_plan")
     */
    public function index()
    {
        return $this->render('plan/listePlan.html.twig', [
            'controller_name' => 'PlanController',
        ]);
    }
}
