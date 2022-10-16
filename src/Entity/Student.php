<?php

namespace App\Entity;

use App\Repository\StudentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StudentRepository::class)]
class Student
{
    #[ORM\Id]
    #[ORM\Column(length: 10)]
    private ?string $nce = null;

    #[ORM\Column(length: 255)]
    private ?string $username = null;

    #[ORM\ManyToOne(inversedBy: 'students')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Classroom $Classe = null;



    /**
     * @return string|null
     */
    public function getNce(): ?string
    {
        return $this->nce;
    }

    /**
     * @param string|null $nce
     */
    public function setNce(?string $nce): void
    {
        $this->nce = $nce;
    }

    /**
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @param string|null $username
     */
    public function setUsername(?string $username): void
    {
        $this->username = $username;
    }

    public function getClasse(): ?Classroom
    {
        return $this->Classe;
    }

    public function setClasse(?Classroom $Classe): self
    {
        $this->Classe = $Classe;

        return $this;
    }



}
