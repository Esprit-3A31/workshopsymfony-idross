<?php

namespace App\Controller;
use App\Entity\Classroom;
use App\Repository\ClassroomRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ClassroomType;
class ClassroomController extends AbstractController
{
    #[Route('/classroom', name: 'app_classroom')]
    public function index(): Response
    {
        return $this->render('classroom/index.html.twig', [
            'controller_name' => 'ClassroomController',
        ]);
    }
     #[Route('/list', name:'listClassroom')]
    public function listClassroom(ClassroomRepository  $repository)
    {
        $Classroom= $repository->findAll();
        return $this->render("Classroom/listClassroom.html.twig",array("tabClassroom"=>$Classroom));
    }
    #[Route('/addClassroomForm', name:'addClassroomForm')]
    public function addClassroomForm(Request $request, ManagerRegistry $doctrine)
    {
    $Classroom = new Classroom();
    $form = $this->createForm(ClassroomType::class, $Classroom);
    $form->handleRequest($request);
    if ($form->isSubmitted()) {
    $em = $doctrine->getManager();
    $em->persist($Classroom);
    $em->flush();
    return$this->redirectToRoute("addClassroomForm");
    }
    return $this->renderForm("Classroom/add.html.twig", array("FormClassroom" => $form));
    }
    #[Route('/updateClassroom/{nce}', name: 'update_Classroom')]
    public function updateClassroomForm($nce,ClassroomRepository $repository,Request $request,ManagerRegistry $doctrine)
    {
    $Classroom= $repository->find($nce);
    $form= $this->createForm(ClassroomType::class,$Classroom);
    $form->handleRequest($request) ;
    if($form->isSubmitted()){
    $em= $doctrine->getManager();
    $em->flush();
    return $this->redirectToRoute("addClassroomForm");
    }
    return $this->renderForm("Classroom/update.html.twig",array("FormClassroom"=>$form));

    }
    #[Route('/removeClassroom/{nce}', name: 'remove_Classroom')]
    public function remove(ManagerRegistry $doctrine,$nce,ClassroomRepository $repository)
    {
    $Classroom= $repository->find($nce);
    $em= $doctrine->getManager();
    $em->remove($Classroom);
    $em->flush();
    return $this->redirectToRoute("addClassroomForm");
    }
}