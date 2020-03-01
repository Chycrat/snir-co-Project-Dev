<?php

namespace App\Controller;

use App\Entity\MaderaDevis;
use App\Form\MaderaDevisType;
use App\Repository\MaderaDevisRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/madera/devis")
 */
class MaderaDevisController extends AbstractController
{
    /**
     * @Route("/", name="madera_devis_index", methods={"GET"})
     */
    public function index(MaderaDevisRepository $maderaDevisRepository): Response
    {
        return $this->render('madera_devis/index.html.twig', [
            'madera_devis' => $maderaDevisRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="madera_devis_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $maderaDevi = new MaderaDevis();
        $form = $this->createForm(MaderaDevisType::class, $maderaDevi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($maderaDevi);
            $entityManager->flush();

            return $this->redirectToRoute('madera_devis_index');
        }

        return $this->render('madera_devis/new.html.twig', [
            'madera_devi' => $maderaDevi,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="madera_devis_show", methods={"GET"})
     */
    public function show(MaderaDevis $maderaDevi): Response
    {
        return $this->render('madera_devis/show.html.twig', [
            'madera_devi' => $maderaDevi,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="madera_devis_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, MaderaDevis $maderaDevi): Response
    {
        $form = $this->createForm(MaderaDevisType::class, $maderaDevi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('madera_devis_index');
        }

        return $this->render('madera_devis/edit.html.twig', [
            'madera_devi' => $maderaDevi,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="madera_devis_delete", methods={"DELETE"})
     */
    public function delete(Request $request, MaderaDevis $maderaDevi): Response
    {
        if ($this->isCsrfTokenValid('delete'.$maderaDevi->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($maderaDevi);
            $entityManager->flush();
        }

        return $this->redirectToRoute('madera_devis_index');
    }
}
