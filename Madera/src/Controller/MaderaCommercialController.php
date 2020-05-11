<?php

namespace App\Controller;

use App\Entity\MaderaCommercial;
use App\Form\MaderaCommercialType;
use App\Repository\MaderaCommercialRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/madera/commercial")
 */
class MaderaCommercialController extends AbstractController
{
    /**
     * @Route("/", name="madera_commercial_index", methods={"GET"})
     */
    public function index(MaderaCommercialRepository $maderaCommercialRepository): Response
    {
        $user = $this->getUser();
        if($user == null){
            return $this->redirectToRoute('app_login');
        }else {
            return $this->render('madera_commercial/index.html.twig', [
                'madera_commercials' => $maderaCommercialRepository->findAll(),
            ]);
        }
    }

    /**
     * @Route("/new", name="madera_commercial_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $user = $this->getUser();
        if($user == null){
            return $this->redirectToRoute('app_login');
        }else {
            $maderaCommercial = new MaderaCommercial();
            $form = $this->createForm(MaderaCommercialType::class, $maderaCommercial);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($maderaCommercial);
                $entityManager->flush();

                return $this->redirectToRoute('madera_commercial_index');
            }

            return $this->render('madera_commercial/new.html.twig', [
                'madera_commercial' => $maderaCommercial,
                'form' => $form->createView(),
            ]);
        }
    }

    /**
     * @Route("/{id}", name="madera_commercial_show", methods={"GET"})
     */
    public function show(MaderaCommercial $maderaCommercial): Response
    {
        $user = $this->getUser();
        if($user == null){
            return $this->redirectToRoute('app_login');
        }else {
            return $this->render('madera_commercial/show.html.twig', [
                'madera_commercial' => $maderaCommercial,
            ]);
        }
    }

    /**
     * @Route("/{id}/edit", name="madera_commercial_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, MaderaCommercial $maderaCommercial): Response
    {
        $user = $this->getUser();
        if($user == null){
            return $this->redirectToRoute('app_login');
        }else {
            $form = $this->createForm(MaderaCommercialType::class, $maderaCommercial);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $this->getDoctrine()->getManager()->flush();

                return $this->redirectToRoute('madera_commercial_index');
            }

            return $this->render('madera_commercial/edit.html.twig', [
                'madera_commercial' => $maderaCommercial,
                'form' => $form->createView(),
            ]);
        }
    }

    /**
     * @Route("/{id}", name="madera_commercial_delete", methods={"DELETE"})
     */
    public function delete(Request $request, MaderaCommercial $maderaCommercial): Response
    {
        $user = $this->getUser();
        if($user == null){
            return $this->redirectToRoute('app_login');
        }else {
            if ($this->isCsrfTokenValid('delete' . $maderaCommercial->getId(), $request->request->get('_token'))) {
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->remove($maderaCommercial);
                $entityManager->flush();
            }

            return $this->redirectToRoute('madera_commercial_index');
        }
    }
}
