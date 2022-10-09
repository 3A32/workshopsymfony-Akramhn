<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorieRepository::class)]
class Categorie
{
    #[ORM\Id]
  
    #[ORM\Column(length: 22)]
    private ?string $ref = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    public function getref(): ?string

    
    {
        return $this->ref;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }
    public function setref(string $ref): self
    {
        $this->ref = $ref;

        return $this;
    }
}