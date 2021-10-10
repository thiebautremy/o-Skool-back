<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ClassesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=ClassesRepository::class)
 * @ApiResource(normalizationContext={"groups"={"read:collection"}})
 */
class Classes
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $class_number;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $level;

    /**
     * @ORM\ManyToOne(targetEntity=Teachers::class, cascade={"persist", "remove"})
     * @Groups({"read:collection"})
     */
    private $teachers;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClassNumber(): ?int
    {
        return $this->class_number;
    }

    public function setClassNumber(?int $class_number): self
    {
        $this->class_number = $class_number;

        return $this;
    }

    public function getLevel(): ?string
    {
        return $this->level;
    }

    public function setLevel(string $level): self
    {
        $this->level = $level;

        return $this;
    }
    /**
    * @Groups({"read:collection"})
    */
    public function getTeachers(): ?Teachers
    {
        return $this->teachers;
    }
    /**
    * @Groups({"read:collection"})
    */
    public function setTeachers(?Teachers $teachers): self
    {
        $this->teachers = $teachers;

        return $this;
    }

}
