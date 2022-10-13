<?php

namespace App\Entity;

use App\Repository\ClassroomRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClassroomRepository::class)]
class Classroom
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;



    #[ORM\Column(length: 100, nullable: true)]
    private ?string $Name = null;

    #[ORM\Column(nullable: true)]
    private ?int $NbrStudent = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $Id): self
    {
        $this->Id = $Id;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(?string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getNbrStudent(): ?int
    {
        return $this->NbrStudent;
    }

    public function setNbrStudent(?int $NbrStudent): self
    {
        $this->NbrStudent = $NbrStudent;

        return $this;
    }
}
