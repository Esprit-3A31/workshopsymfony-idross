<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class KhaledController extends AbstractController
{
    #[Route('/add/{var}', name: 'add_khaled')]
    public function add_khaled($var): Response
    {
       return new Response("Khaled :".$var)  ; 
    }
    #[Route('/list', name: 'list_khaled')]

    public function list(): Response
    {
       return $this->render("khaled/list.html.twig")  ; 
    }

}
