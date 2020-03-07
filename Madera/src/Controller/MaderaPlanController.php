<?php

namespace App\Controller;

use App\Entity\MaderaPlan;
use App\Entity\MaderaProjet;
use App\Form\MaderaPlanType;
use App\Repository\MaderaPlanRepository;
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
     * @Route("/{projetId}/projet", name="madera_plan_projet", methods={"GET"})
     */
    public function indexParProjet($projetId, MaderaPlanRepository $maderaPlanRepository): Response
    {
        return $this->render('madera_plan/index.html.twig', [
            'madera_plans' => $maderaPlanRepository->findByProjetId($projetId),
            'projet_id' => $projetId
        ]);
    }

    /**
     * @Route("/new/{id}", name="madera_plan_new", methods={"GET","POST"})
     */
    public function new(Request $request, MaderaProjet $maderaProjet): Response
    {
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

            return $this->redirectToRoute('madera_plan_index');
        }

        return $this->render('madera_plan/new.html.twig', [
            'madera_plan' => $maderaPlan,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="madera_plan_show", methods={"GET"})
     */
    public function show(MaderaPlan $maderaPlan): Response
    {
        return $this->render('madera_plan/show.html.twig', [
            'madera_plan' => $maderaPlan,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="madera_plan_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, MaderaPlan $maderaPlan): Response
    {
        $form = $this->createForm(MaderaPlanType::class, $maderaPlan);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $maderaPlan->setDateDerniereModification(new DateTime());
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('madera_plan_index');
        }

        return $this->render('madera_plan/edit.html.twig', [
            'madera_plan' => $maderaPlan,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="madera_plan_delete", methods={"DELETE"})
     */
    public function delete(Request $request, MaderaPlan $maderaPlan): Response
    {
        if ($this->isCsrfTokenValid('delete'.$maderaPlan->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($maderaPlan);
            $entityManager->flush();
        }

        return $this->redirectToRoute('madera_plan_index');
    }
}
