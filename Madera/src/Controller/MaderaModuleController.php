<?php

namespace App\Controller;

use App\Entity\MaderaModule;
use App\Form\MaderaModuleType;
use App\Repository\MaderaModuleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/madera/module")
 */
class MaderaModuleController extends AbstractController
{
    /**
     * @Route("/", name="madera_module_index", methods={"GET"})
     */
    public function index(MaderaModuleRepository $maderaModuleRepository): Response
    {
        $user = $this->getUser();
        if($user == null){
            return $this->redirectToRoute('app_login');
        }else {
            return $this->render('madera_module/index.html.twig', [
                'madera_modules' => $maderaModuleRepository->findAll(),
            ]);
        }
    }

    /**
     * @Route("/new", name="madera_module_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $user = $this->getUser();
        if($user == null){
            return $this->redirectToRoute('app_login');
        }else {
            $maderaModule = new MaderaModule();
            $form = $this->createForm(MaderaModuleType::class, $maderaModule);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($maderaModule);
                $entityManager->flush();

                return $this->redirectToRoute('madera_module_index');
            }

            return $this->render('madera_module/new.html.twig', [
                'madera_module' => $maderaModule,
                'form' => $form->createView(),
            ]);
        }
    }

    /**
     * @Route("/{id}", name="madera_module_show", methods={"GET"})
     */
    public function show(MaderaModule $maderaModule): Response
    {
        $user = $this->getUser();
        if($user == null){
            return $this->redirectToRoute('app_login');
        }else {
            return $this->render('madera_module/show.html.twig', [
                'madera_module' => $maderaModule,
            ]);
        }
    }

    /**
     * @Route("/{id}/edit", name="madera_module_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, MaderaModule $maderaModule): Response
    {
        $user = $this->getUser();
        if($user == null){
            return $this->redirectToRoute('app_login');
        }else {
            $form = $this->createForm(MaderaModuleType::class, $maderaModule);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $this->getDoctrine()->getManager()->flush();

                return $this->redirectToRoute('madera_module_index');
            }

            return $this->render('madera_module/edit.html.twig', [
                'madera_module' => $maderaModule,
                'form' => $form->createView(),
            ]);
        }
    }

    /**
     * @Route("/{id}", name="madera_module_delete", methods={"DELETE"})
     */
    public function delete(Request $request, MaderaModule $maderaModule): Response
    {
        $user = $this->getUser();
        if($user == null){
            return $this->redirectToRoute('app_login');
        }else {
            if ($this->isCsrfTokenValid('delete' . $maderaModule->getId(), $request->request->get('_token'))) {
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->remove($maderaModule);
                $entityManager->flush();
            }

            return $this->redirectToRoute('madera_module_index');
        }
    }
}
