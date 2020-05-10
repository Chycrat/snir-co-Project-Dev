<?php


namespace App\Controller;


use App\Repository\MaderaClientRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

/**
 * @Route("/")
 */
class IndexController extends AbstractController
{
    private $security;

    public function __construct(Security $security)
    {
        // Avoid calling getUser() in the constructor: auth may not
        // be complete yet. Instead, store the entire Security object.
        $this->security = $security;
    }

    /**
     * @Route("/", name="index", methods={"GET"})
     */
    public function index(): Response
    {
        $user = $this->security->getUser();
        if($user == null){
            return $this->redirectToRoute('app_login');
        }else {
            return $this->redirectToRoute('madera_client_index');
        }
    }
}