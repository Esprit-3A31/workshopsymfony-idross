<?php

namespace App\Entity;

use App\Repository\StudentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StudentRepository::class)]
class Student
{
    #[ORM\Id]
    #[ORM\Column]
    private ?int $Ref= null;

    #[ORM\Column(length: 100)]
    private ?string $Username = null;

    /**
     * @return int|null
     */
    public function getRef(): ?int
    {
        return $this->Ref;
    }



    public function getUsername(): ?string
    {
        return $this->Username;
    }

    public function setUsername(string $Username): self
    {
        $this->Username = $Username;

        return $this;
    }
}
