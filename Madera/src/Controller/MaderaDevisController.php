<?php

namespace App\Controller;

use App\Entity\MaderaDevis;
use App\Entity\MaderaPlan;
use App\Entity\MaderaSol;
use App\Entity\MaderaToit;
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
     * @Route("/new/{id}/plan", name="madera_devis_new", methods={"GET","POST"})
     */
    public function new(Request $request, $id): Response
    {
        $maderaDevi = new MaderaDevis();
        $form = $this->createForm(MaderaDevisType::class, $maderaDevi);
        $form->handleRequest($request);

        $entityManager = $this->getDoctrine()->getManager();
        $data = $this->generateDevis($id);
        //FAIRE LE NOUVEAU DEVIS EN AUTO

        $entityManager->persist($maderaDevi);
        $entityManager->flush();

        return $this->redirectToRoute('madera_devis_show', [
            'madera_devi' => $maderaDevi,
            'idPlan' => $id
        ]);
    }

    /**
     * @Route("{idPlan}/plan", name="madera_devis_show", methods={"GET"})
     */
    public function show($idPlan): Response
    {
        $maderaDevi = $this->getDoctrine()
            ->getRepository(MaderaDevis::class)
            ->findBy('plan_devis_id', $idPlan);

        return $this->render('madera_devis/show.html.twig', [
            'madera_devi' => $maderaDevi,
            'idPlan' => $idPlan
        ]);
    }

    /**
     * @Route("/{id}/{idPlan}", name="madera_devis_delete", methods={"DELETE"})
     */
    public function delete(Request $request, MaderaDevis $maderaDevi, $idPlan): Response
    {
        if ($this->isCsrfTokenValid('delete'.$maderaDevi->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($maderaDevi);
            $entityManager->flush();
        }
        $MaderaPlan = $this->getDoctrine()
            ->getRepository(MaderaPlan::class)
            ->find($idPlan);

        return $this->redirectToRoute('madera_plan_show', array('MaderPlan'=>$MaderaPlan));
    }

    public function generateDevis($id){
        $MaderaPlan = $this->getDoctrine()
            ->getRepository(MaderaPlan::class)
            ->find($id);

        $toit = $MaderaPlan->getMaderaToit();

        $sol = $MaderaPlan->getMaderaSol();

        $gamme = $MaderaPlan->getMaderaGamme();

        $coupe = $MaderaPlan->getMaderaCoupe();

        $modules = $MaderaPlan->getModules();


    }
}
