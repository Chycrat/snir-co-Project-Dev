<?php

namespace App\Controller;

use App\Entity\MaderaClient;
use App\Form\MaderaClientType;
use App\Repository\MaderaClientRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/madera/client")
 */
class MaderaClientController extends AbstractController
{
    /**
     * @Route("/", name="madera_client_index", methods={"GET"})
     */
    public function index(MaderaClientRepository $maderaClientRepository): Response
    {
        return $this->render('madera_client/index.html.twig', [
            'madera_clients' => $maderaClientRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="madera_client_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $maderaClient = new MaderaClient();
        $form = $this->createForm(MaderaClientType::class, $maderaClient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($maderaClient);
            $entityManager->flush();

            return $this->redirectToRoute('madera_client_index');
        }

        return $this->render('madera_client/new.html.twig', [
            'madera_client' => $maderaClient,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="madera_client_show", methods={"GET"})
     */
    public function show(MaderaClient $maderaClient): Response
    {
        return $this->render('madera_client/show.html.twig', [
            'madera_client' => $maderaClient,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="madera_client_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, MaderaClient $maderaClient): Response
    {
        $form = $this->createForm(MaderaClientType::class, $maderaClient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('madera_client_index');
        }

        return $this->render('madera_client/edit.html.twig', [
            'madera_client' => $maderaClient,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="madera_client_delete", methods={"DELETE"})
     */
    public function delete(Request $request, MaderaClient $maderaClient): Response
    {
        if ($this->isCsrfTokenValid('delete'.$maderaClient->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($maderaClient);
            $entityManager->flush();
        }

        return $this->redirectToRoute('madera_client_index');
    }
}
