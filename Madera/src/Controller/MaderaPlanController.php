<?php

namespace App\Controller;

use App\Entity\MaderaDevis;
use App\Entity\MaderaPlan;
use App\Entity\MaderaProjet;
use App\Form\MaderaPlanType;
use App\Repository\MaderaPlanRepository;
use App\Repository\MaderaProjetRepository;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/madera/plan")
 */
class MaderaPlanController extends AbstractController
{
    /**
     * @Route("/", name="madera_plan_index", methods={"GET"})
     */
    public function index(MaderaPlanRepository $maderaPlanRepository): Response
    {
        return $this->render('madera_plan/index.html.twig', [
            'madera_plans' => $maderaPlanRepository->findAll(),
        ]);
    }
    /**
     * @Route("/{id}/projet", name="madera_plan_projet", methods={"GET"})
     */
    public function indexParProjet($id, MaderaPlanRepository $maderaPlanRepository): Response
    {
        $plans = $maderaPlanRepository->findByProjetId($id);
        $planArray = array();
        foreach ($plans as $plan){
            array_push($planArray, array(
                'plan' => $plan,
                'devis' => $this->getDevisOfPlan($plan)
            ));
        }
        return $this->render('madera_plan/index.html.twig', [
            'madera_plans' => $planArray,
            'projet_id' => $id
        ]);
    }

    /**
     * @Route("/new/{id}", name="madera_plan_new", methods={"GET","POST"})
     */
    public function new(Request $request, $id): Response
    {
        $maderaProjet = $this->getDoctrine()
            ->getRepository(MaderaProjet::class)
            ->find($id);
        $maderaPlan = new MaderaPlan();
        $maderaPlan->setMaderaProjet($maderaProjet);
        $maderaPlan->setDateCreation(new DateTime);
        $maderaPlan->setDateDerniereModification(new DateTime());
        $form = $this->createForm(MaderaPlanType::class, $maderaPlan);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($maderaPlan);
            $entityManager->flush();

            return $this->redirectToRoute('madera_plan_projet', array('id'=>$id));
        }
        return $this->render('madera_plan/new.html.twig', [
            'madera_plan' => $maderaPlan,
            'projet_id' => $id,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/{idProjet}", name="madera_plan_show", methods={"GET"})
     */
    public function show(MaderaPlan $maderaPlan, $idProjet): Response
    {
        return $this->render('madera_plan/show.html.twig', [
            'madera_plan' => $maderaPlan,
            'projet_id' => $idProjet,
            'plan_devis' => $this->getDevisOfPlan($maderaPlan)
        ]);
    }

    /**
     * @Route("/{id}/edit/{idProjet}", name="madera_plan_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, MaderaPlan $maderaPlan, $idProjet): Response
    {
        $form = $this->createForm(MaderaPlanType::class, $maderaPlan);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $maderaPlan->setDateDerniereModification(new DateTime());
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('madera_plan_projet', array('id'=>$idProjet));
        }

        return $this->render('madera_plan/edit.html.twig', [
            'madera_plan' => $maderaPlan,
            'projet_id' => $idProjet,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/delete/{idProjet}", name="madera_plan_delete", methods={"DELETE"})
     */
    public function delete(Request $request, MaderaPlan $maderaPlan, $idProjet): Response
    {
        if ($this->isCsrfTokenValid('delete'.$maderaPlan->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $devis = $this->getDevisOfPlan($maderaPlan);
            $entityManager->remove($devis);
            $entityManager->remove($maderaPlan);
            $entityManager->flush();
        }

        return $this->redirectToRoute('madera_plan_projet');
    }

    public function getDevisOfPlan(MaderaPlan $plan){
        return $this->getDoctrine()
            ->getRepository(MaderaDevis::class)
            ->findByPlanId($plan->getId());
    }

}
