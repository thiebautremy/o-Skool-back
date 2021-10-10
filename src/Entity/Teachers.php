<?php

namespace App\Entity;

use App\Repository\TeachersRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(TeachersRepository::class)
 * @ApiResource(
 *  normalizationContext={},
 *  collectionOperations={"get"}
 * )
 */
class Teachers
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"read:collection"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     *  @Groups({"read:collection"})
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     *  @Groups({"read:collection"})
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *  @Groups({"read:collection"}))
     */
    private $teacher_picture;

    /**
     * @ORM\Column(type="string", length=10, nullable=false)
     *  @Groups({"read:collection"})
     */
    private $teacher_number;


    public function __construct()
    {
        $this->classe = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getTeacherPicture(): ?string
    {
        return $this->teacher_picture;
    }

    public function setTeacherPicture(?string $teacher_picture): self
    {
        $this->teacher_picture = $teacher_picture;

        return $this;
    }

    public function getTeacherNumber(): ?string
    {
        return $this->teacher_number;
    }

    public function setTeacherNumber(?string $teacher_number): self
    {
        $this->teacher_number = $teacher_number;

        return $this;
    }

}
