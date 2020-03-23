<?php

namespace App\Controller;

use App\Entity\MaderaClient;
use App\Entity\MaderaCoupe;
use App\Entity\MaderaDevis;
use App\Entity\MaderaPlan;
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
     * @Route("/new/{id}/plan/{idProjet}/projet", name="madera_devis_new", methods={"GET","POST"})
     */
    public function new(Request $request, $id, $idProjet): Response
    {
        $maderaDevis = new MaderaDevis();

        $entityManager = $this->getDoctrine()->getManager();
        $maderaDevis = $this->generateDevis($id);
        //FAIRE LE NOUVEAU DEVIS EN AUTO

        $entityManager->persist($maderaDevis);
        $entityManager->flush();

        return $this->redirectToRoute('madera_plan_projet', [
            'id' => $idProjet
        ]);
    }

    /**
     * @Route("/edit/{id}/plan", name="madera_devis_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, $id): Response
    {
        $maderaDevis = new MaderaDevis();

        $entityManager = $this->getDoctrine()->getManager();
        $maderaDevis = $this->generateDevis($id);
        //FAIRE LE NOUVEAU DEVIS EN AUTO

        $entityManager->persist($maderaDevis);
        $entityManager->flush();

        return $this->redirectToRoute('madera_devis_show', [
            'id' => $maderaDevis,
            'idPlan' => $id
        ]);
    }

    /**
     * @Route("/{id}/plan/{idPlan}", name="madera_devis_show", methods={"GET"})
     */
    public function show($id,  $idPlan): Response
    {
        $maderaDevis = $this->getDoctrine()
            ->getRepository(MaderaDevis::class)
            ->find($id);
        $MaderaPlan = $this->getDoctrine()
            ->getRepository(MaderaPlan::class)
            ->find($idPlan);
        $client = $MaderaPlan->getMaderaProjet()->getMaderaClient();
        $coupe = $MaderaPlan->getMaderaCoupe();
        $projet = $MaderaPlan->getMaderaProjet();
        dump($client);
        dump($coupe);
        dump($projet);
        return $this->render('madera_devis/show.html.twig', [
            'devis' => $maderaDevis,
            'client' => $client,
            'plan' => $MaderaPlan,
            'coupe' => $coupe,
            'idPlan' => $idPlan,
            'projet' => $projet
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
        $devis = new MaderaDevis();

        $MaderaPlan = $this->getDoctrine()
            ->getRepository(MaderaPlan::class)
            ->find($id);

        $toit = $MaderaPlan->getMaderaToit();

        $sol = $MaderaPlan->getMaderaSol();

        $gamme = $MaderaPlan->getMaderaGamme();

        $modules = $MaderaPlan->getModules();

        $prixHt = 0;

        foreach ($modules as $module) {
            $prixHt += $module->getPrixHtModule();
        }

        $prixHt += $sol->getPrixHtSol() + $toit->getPrixHtToit();
        $prixHt *= $gamme->getPourcentagePrix()/100;
        $margeCommercial = 0.10;
        $margeEntreprise = 0.10;

        $devis->setCodeDevis($MaderaPlan->getDateCreation()->format('dmY').''.$MaderaPlan->getId());
        $devis->setMargeCommerciauxDevis($margeCommercial);
        $devis->setMargeEntrepriseDevis($margeEntreprise);
        $devis->setPlanDevis($MaderaPlan);
        $devis->setDateDevis(new \DateTime());
        $devis->setMontantHtDevis($prixHt);
        $prixTTC = $devis->getMontantHtDevis()*1.20 + ($prixHt*$margeCommercial) + ($prixHt*$margeEntreprise);
        $devis->setMontantTtcDevis($prixTTC);
        $devis->setDateValidation(null);

        return $devis;
    }
}
