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


    /**
     * @Route("/add", name="add_plan")
     */
    public function addPlan()
    {
        return $this->render('plan/addPlan.html.twig');
    }

    /**
     * @Route("/{id}/show", name="show_plan")
     */
    public function showPlan($id)
    {
        return $this->render('plan/showPlan.html.twig');
    }

    /**
     * @Route("/{id}/delete", name="delete_plan")
     */
    public function deletePlan($id)
    {
        return $this->render('plan/listePlan.html.twig');
    }

    /**
     * @Route("/{id}/update", name="update_plan")
     */
    public function updatePlan($id){
        return $this->render('plan/showpPlan.html.twig');
    }
}
