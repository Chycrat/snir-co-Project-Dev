<?php 

namespace App\Controller;

use App\Entity\MaderaClient;
use http\Client;
use http\Env\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/client")
 */
class ClientController extends AbstractController
{
    /**
    * @Route("/liste", name="liste_client")
    */
    public function index( Request $request)
    {
        $clients = $this->getDoctrine()
            ->getRepository(MaderaClient::class)
            ->findAll();

        return $this->render('client/listeClient.html.twig',array(
            "clients"=> $clients
        ));
    }

    /**
     * @Route("/add", name="add_client")
     */
    public function addClient(Request $request)
    {
        $client = new MaderaClient();
        $form = $this->get('form.factory')->createBuilder(MaderaClientType::class, $client);
        if ($request->isMethod('POST')) {
            // On fait le lien Requête <-> Formulaire
            // À partir de maintenant, la variable $advert contient les valeurs entrées dans le formulaire par le visiteur
            $form->handleRequest($request);

            // On vérifie que les valeurs entrées sont correctes
            // (Nous verrons la validation des objets en détail dans le prochain chapitre)
            if ($form->isValid()) {
                // On enregistre notre objet $advert dans la base de données, par exemple
                $em = $this->getDoctrine()->getManager();
                $em->persist($client);
                $em->flush();

                $request->getSession()->getFlashBag()->add('notice', 'client bien enregistrée.');

                // On redirige vers la page de visualisation de l'annonce nouvellement créée
                return $this->redirectToRoute('show_client', array('id' => $client->getId()));
            }
        }

        return $this->render('client/addClient.html.twig');
    }

    /**
     * @Route("/{id}/show", name="show_client")
     */
    public function showClient($id, Request $request)
    {
        $client = $this->getDoctrine()
            ->getRepository(MaderaClient::class)
            ->find($id);
        return $this->render('client/showClient.html.twig',array(
            "client" => array(
                "nom" => "met ce que tu veux",
                "prenom" => "mes couilles"
            )
        ));
    }

    /**
     * @Route("/{id}/delete", name="delete_client")
     */
    public function deleteClient($id,  Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $client = $this->getDoctrine()
            ->getRepository(MaderaClient::class)
            ->find($id);
        $em->remove($client);
        $em->flush();

        $request->getSession()->getFlashBag()->add('info', "L'annonce a bien été supprimée.");
        return $this->render('client/listeClient.html.twig');
    }

    /**
     * @Route("/{id}/update", name="update_client")
     */
    public function updateClient($id,  Request $request){

        $client = $this->getDoctrine()
            ->getRepository(MaderaClient::class)
            ->find($id);
        $form = $this->get('form.factory')->createBuilder(MaderaClientType::class, $client);
        if ($request->isMethod('POST')) {
            // On fait le lien Requête <-> Formulaire
            // À partir de maintenant, la variable $advert contient les valeurs entrées dans le formulaire par le visiteur
            $form->handleRequest($request);

            // On vérifie que les valeurs entrées sont correctes
            // (Nous verrons la validation des objets en détail dans le prochain chapitre)
            if ($form->isValid()) {

                $request->getSession()->getFlashBag()->add('notice', 'client bien modifié.');

                // On redirige vers la page de visualisation de l'annonce nouvellement créée
                return $this->redirectToRoute('show_client', array('id' => $client->getId()));
            }
        }
        return $this->render('client/addClient.html.twig', array(
            "client"=>$client
        ));
    }
}