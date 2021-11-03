<?php

namespace App\DataFixtures;

use App\Entity\Student;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Validator\Constraints\DateTime;

class StudentsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
        {
            $students = [
                0 => [
                    'first_name' => 'tom',
                    'last_name' => 'égérie',
                    'adress' => '3 rue des Chevaliers',
                    'city' => 'Ailleurs',
                    'zip_code' => 52470,
                    'phone' => 0652525252,
                    'email' => 'tomegerie@oskool.fr',
                    'health' => '',
                    'hobbies' => 'course en sac',
                    'class' => 'CM1',
                    'random' => 'Va toujours à la cantine et au périscolaire',
                    'birthday' => "2019-10-06"
                ],
                1 => [
                    'first_name' => 'vivien',
                    'last_name' => 'chémoi',
                    'adress' => '15 rue des Sardines',
                    'city' => 'Loin',
                    'zip_code' => 45789,
                    'phone' => 0645454545,
                    'email' => 'vivienchemoi@oskool.fr',
                    'health' => 'Allérgie gluten',
                    'hobbies' => 'rugby',
                    'class' => 'CE1',
                    'random' => 'Ne peut pas pratiquer de sport',
                    'birthday' => "2019-05-12"
                ],
                2 => [
                    'first_name' => 'zackary',
                    'last_name' => 'amablague',
                    'adress' => '155 rue des Mouches',
                    'city' => 'Paris',
                    'zip_code' => 77890,
                    'phone' => 0632323232,
                    'email' => 'zackaryamablague@oskool.fr',
                    'health' => 'Allérgie arachide',
                    'hobbies' => 'cuisine',
                    'class' => 'CE1',
                    'random' => 'Parents divorcés',
                    'birthday' => "2019-12-22"
                ],
                3 => [
                    'first_name' => 'eva',
                    'last_name' => 'pauré',
                    'adress' => '1 bis avenue George',
                    'city' => 'Ailleurs',
                    'zip_code' => 52470,
                    'phone' => 0612121212,
                    'email' => 'evapaure@oskool.fr',
                    'health' => '',
                    'hobbies' => 'foobtall',
                    'class' => 'CE2',
                    'random' => 'Facilité en Mathématique',
                    'birthday' => "2019-01-05"
                ],
                4 => [
                    'first_name' => 'maud',
                    'last_name' => 'erateur',
                    'adress' => '12 avenue Michel',
                    'city' => 'Toulouse',
                    'zip_code' => 58950,
                    'phone' => 0602020202,
                    'email' => 'mauderateur@oskool.fr',
                    'health' => '',
                    'hobbies' => 'camping',
                    'class' => 'CP',
                    'random' => 'Caractère difficile',
                    'birthday' => "2019-03-22"
                ]
            ];

            foreach ($students as $student) {
                $newStudent = new Student();
                $newStudent
                    ->setFirstName($student['first_name'])
                    ->setLastName($student['last_name'])
                    ->setAdress($student['adress'])
                    ->setCity($student['city'])
                    ->setZipCode($student['zip_code'])
                    ->setPhone($student['phone'])
                    ->setEmail($student['email'])
                    ->setHealth($student['health'])
                    ->setHobbies($student['hobbies'])
                    ->setClass($student['class'])
                    ->setRandom($student['random'])
                    ->setBirthday(\DateTime::createFromFormat('Y-m-d', $student['birthday']));
    
                $manager->persist($newStudent);
            }
    

            $manager->flush();
        }
}
