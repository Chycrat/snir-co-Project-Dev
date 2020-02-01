<?php 

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class ClientController extends AbstractController
{
    /**
    * @Route("/listeClient")
    */
    public function index()
    {
        return $this->render('listeClient.html.twig', [
            'controller_name' => 'ClientController',
        ]);
    }
}