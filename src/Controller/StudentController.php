<?php

namespace App\Controller;

use App\Repository\StudentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StudentController extends AbstractController
{
    #[Route('/student', name: 'app_student')]
    public function index(): Response
    {
        return $this->render('student/index.html.twig', [
            'controller_name' => 'StudentController',
        ]);
    }

    #[Route('/student', name: 'app_student')]
    public function liststudent(StudentRepository $rep)
    {
        $students =$rep->findAll() ;
        //return new Response("réservation!");
        return $this->render("student/student.html.twig",['tab_student'=>$students]);
    }


}
