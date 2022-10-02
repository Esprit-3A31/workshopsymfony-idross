<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClubController extends AbstractController
{

     #[Route('/club', name: 'app_club')]


    public function index(): Response
    {
        return $this->render('club/index.html.twig', [
            'controller_name' => 'ClubController',
        ]);
    }
    #[Route('/club/{var}', name: 'getClub')]
    public function getName($var)
    {
        //   return new Response("Club de sport à ".$var);
        $x="welcome to our club";
        return $this->render("club/club.html.twig", array("ecole"=>$var,"varx"=>$x)
        );
    }
}
