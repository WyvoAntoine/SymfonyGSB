<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategorieRepository::class)
 */
class Categorie
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomCategorie;

    /**
     * @ORM\ManyToMany(targetEntity=Domaine::class)
     */
    private $idDomaine;

    public function __construct()
    {
        $this->idDomaine = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCategorie(): ?string
    {
        return $this->nomCategorie;
    }

    public function setNomCategorie(string $nomCategorie): self
    {
        $this->nomCategorie = $nomCategorie;

        return $this;
    }

    /**
     * @return Collection|Domaine[]
     */
    public function getIdDomaine(): Collection
    {
        return $this->idDomaine;
    }

    public function addIdDomaine(Domaine $idDomaine): self
    {
        if (!$this->idDomaine->contains($idDomaine)) {
            $this->idDomaine[] = $idDomaine;
        }

        return $this;
    }

    public function removeIdDomaine(Domaine $idDomaine): self
    {
        $this->idDomaine->removeElement($idDomaine);

        return $this;
    }
}
