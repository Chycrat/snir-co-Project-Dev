<?php 

namespace App\Controller;

use App\Entity\MaderaClient;
use http\Client;
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
    public function index()
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
    public function addClient()
    {
        return $this->render('client/addClient.html.twig');
    }

    /**
     * @Route("/{id}/show", name="show_client")
     */
    public function showClient($id)
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
    public function deleteClient($id)
    { 
        return $this->render('client/listeClient.html.twig');
    }

    /**
     * @Route("/{id}/update", name="update_client")
     */
    public function updateClient($id){
        return $this->render('client/addClient.html.twig');
    }
}