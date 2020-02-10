<?php 

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


/**
 * @Route("/client")
 */
class ClientController extends AbstractController
{
    /**
    * @Route("/liste")
    */
    public function index()
    {
        return $this->render('listeClient.html.twig');
    }
    /**
     * @Route("/add" name="add_client")
     */
    public function addClient($id)
    {
        return $this->render('ajoutClient.html.twig');
    }
    /**
     * @Route("/{id}/show" name="show_client")
     */
    public function showClient($id)
    {
        return $this->render('showClient.html.twig');
    }
    /**
     * @Route("/{id}/delete" name="delete_client")
     */
    public function deleteClient($id)
    {
        return $this->render('listeClient.html.twig');
    }

    /**
     * @Route("/{id}/update" name="update_client")
     */
    public function updateClient($id){
        return $this->render('showClient.html.twig');
    }
}