<?php

namespace App\Controller;

use App\Entity\Club;
use App\Form\ClubType;
use App\Repository\ClubRepository;
use App\Repository\StudentRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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



    #[Route('/students', name: 'app_students')]

    public function listStudent(StudentRepository $repository)
    {
        $student= $repository->findAll();
        return $this->render("student/listStudent.html.twig",array("tabStudents"=>$student));
    }

    #[Route('/addStudent', name: 'app_addStudent')]
    public function addStudent(ManagerRegistry $doctrine,Request $request)
    {
        $student= new Student();
        $form=$this->createForm(StudentType::class,$student);

        $form->handleRequest($request);
        if($form->isSubmitted()){
            $em =$doctrine->getManager() ;
            $em->persist($student);
            $em->flush();
            return $this->redirectToRoute("app_students");
        }
        return $this->renderForm("student/addStudent.html.twig",
            array("formStudent"=>$form));
    }

    #[Route('/updateStudent/{nce}', name: 'app_updateStudent')]
    public function updateStudent(ClubRepository $repository,$id,ManagerRegistry $doctrine,Request $request)
    {
        $student= $repository->find($id);
        $form=$this->createForm(StudentType::class,$student);
        $form->handleRequest($request);
        if($form->isSubmitted()){
            $em =$doctrine->getManager();
            $em->flush();
            return $this->redirectToRoute("app_students");
        }
        return $this->renderForm("student/updateStudent.html.twig",
            array("formStudent"=>$form));
    }

    #[Route('/removeStudent/{nce}', name: 'app_removeStudent')]

    public function deleteStudent(ManagerRegistry $doctrine,$id,ClubRepository $repository)
    {
        $student= $repository->find($id);
        $em= $doctrine->getManager();
        $em->remove($student);
        $em->flush();
        return $this->redirectToRoute("app_students");

    }




}
