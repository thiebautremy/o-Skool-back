<?php

namespace App\Controller;

use App\Entity\Teachers;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\TeachersRepository;
use Symfony\Component\HttpFoundation\Request;

/**
* @Route("/teachers")
*/
class TeachersController extends AbstractController
{
    /**
     * @Route("/teachers", name="teachers_list")
     */
    public function list()
    {
         /** @var TeachersRepository */
         $repository = $this->getDoctrine()->getRepository(Teachers::class);
         $teachers = $repository->findAll();
        return $this->render('base.html.twig',
        [
            "teachers" => $teachers
        ]);

    }


}