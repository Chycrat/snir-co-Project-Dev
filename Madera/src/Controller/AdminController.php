<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

/**
* Require ROLE_ADMIN for *every* controller method in this class.
*
* @IsGranted("ROLE_ADMIN")
*/
class AdminController extends AbstractController
{
    /**
    * Require ROLE_ADMIN for only this controller method.
    *
    * @IsGranted("ROLE_ADMIN")
    */
    public function adminDashboard()
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
    }
    public function index()
    {
        $user = $this->getUser();
        if($user == null){
            return $this->redirectToRoute('app_login');
        }else {
            // usually you'll want to make sure the user is authenticated first
            $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

            // returns your User object, or null if the user is not authenticated
            // use inline documentation to tell your editor your exact User class
            /** @var \App\Entity\User $user */
            $user = $this->getUser();

            // Call whatever methods you've added to your User class
            // For example, if you added a getFirstName() method, you can use that.
            return new Response('Well hi there ' . $user->getFirstName());
        }
    }
}