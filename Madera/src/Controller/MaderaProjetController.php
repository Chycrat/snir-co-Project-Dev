<?php

namespace App\Controller;

use App\Entity\MaderaProjet;
use App\Form\MaderaProjetType;
use App\Repository\MaderaProjetRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use DateTime;

/**
 * @Route("/madera/projet")
 */
class MaderaProjetController extends AbstractController
{
    /**
     * @Route("/", name="madera_projet_index", methods={"GET"})
     */
    public function index(MaderaProjetRepository $maderaProjetRepository): Response
    {
        $user = $this->getUser();
        if($user == null){
            return $this->redirectToRoute('app_login');
        }else {
            return $this->render('madera_projet/index.html.twig', [
                'madera_projets' => $maderaProjetRepository->findAll(),
            ]);
        }
    }

    /**
     * @Route("/new", name="madera_projet_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $user = $this->getUser();
        if($user == null){
            return $this->redirectToRoute('app_login');
        }else {
            $maderaProjet = new MaderaProjet();
            $form = $this->createForm(MaderaProjetType::class, $maderaProjet);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $maderaProjet->setDateCreationProjet(new DateTime());
                $maderaProjet->setDateModificationProjet(new DateTime());
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($maderaProjet);
                $entityManager->flush();

                return $this->redirectToRoute('madera_projet_index');
            }

            return $this->render('madera_projet/new.html.twig', [
                'madera_projet' => $maderaProjet,
                'form' => $form->createView(),
            ]);
        }
    }

    /**
     * @Route("/{id}", name="madera_projet_show", methods={"GET"})
     */
    public function show(MaderaProjet $maderaProjet): Response
    {
        $user = $this->getUser();
        if($user == null){
            return $this->redirectToRoute('app_login');
        }else {
            return $this->render('madera_projet/show.html.twig', [
                'madera_projet' => $maderaProjet,
            ]);
        }
    }

    /**
     * @Route("/{id}/edit", name="madera_projet_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, MaderaProjet $maderaProjet): Response
    {
        $user = $this->getUser();
        if($user == null){
            return $this->redirectToRoute('app_login');
        }else {
            $form = $this->createForm(MaderaProjetType::class, $maderaProjet);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $maderaProjet->setDateModificationProjet(new DateTime());
                $this->getDoctrine()->getManager()->flush();

                return $this->redirectToRoute('madera_projet_index');
            }

            return $this->render('madera_projet/edit.html.twig', [
                'madera_projet' => $maderaProjet,
                'form' => $form->createView(),
            ]);
        }
    }

    /**
     * @Route("/{id}", name="madera_projet_delete", methods={"DELETE"})
     */
    public function delete(Request $request, MaderaProjet $maderaProjet): Response
    {
        $user = $this->getUser();
        if($user == null){
            return $this->redirectToRoute('app_login');
        }else {
            if ($this->isCsrfTokenValid('delete' . $maderaProjet->getId(), $request->request->get('_token'))) {
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->remove($maderaProjet);
                $entityManager->flush();
            }

            return $this->redirectToRoute('madera_projet_index');
        }
    }
}
