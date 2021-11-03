<?php

namespace App\Controller;

use App\Entity\Student;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\StudentRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Exception\NotEncodableValueException;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;

class StudentsController extends AbstractController
{
    /**
     * @Route("/api/students", name="students_list")
     */
    public function findAll()
    {
         /** @var StudentRepository */
         $repository = $this->getDoctrine()->getRepository(Student::class);
         $students = $repository->findAll();
        return json_encode( $students );

    }

    /**
     * @Route("/api/studentsList/", name="api_studentsList", methods={"GET"})
     */
    public function getStudents(Request $request, StudentRepository $sr): Response
    {
            return $this->json($sr->findAll());
    }

    /**
     * @Route("/api/studentsList/{id}", name="api_studentsList_detail")
     */
    public function getStudent(StudentRepository $sr, Request $request, int $id)
    {
        return $this->json($sr->find($id));
    }

    /**
     * @Route("/api/student/add", name="api_student_add", methods={"POST"})
     */
    public function newStudent(Request $request)
    {
        dump(json_decode($request->getContent()));
        $data = json_decode($request->getContent(), true);
        dump($data);
        $newStudent = new Student();
        dump($newStudent);
        // $newStudent
        //     ->setFirstName($request->get('first_name'))
        //     ->setLastName($request->get('last_name'))
        //     ->setAdress($request->get('adress'))
        //     ->setCity($request->get('city'))
        //     ->setZipCode($request->get('zip_code'))
        //     ->setPhone($request->get('phone'))
        //     ->setEmail($request->get('email'))
        //     ->setHealth($request->get('health'))
        //     ->setHobbies($request->get('hobbies'))
        //     ->setClass($request->get('class'))
        //     ->setRandom($request->get('random'))
        //     ->setBirthday($request->get('birthday'));

        // $entityManager = $this->getDoctrine()->getManager();
        // $entityManager->persist($newStudent);
        // $entityManager->flush();

        // return new JsonResponse(
        //     [
        //         'status' => 201,
        //     ],
        //     JsonResponse::HTTP_CREATED
        // );
        return new JsonResponse(['hearts' => rand(5, 100)]);
    }
    



}
