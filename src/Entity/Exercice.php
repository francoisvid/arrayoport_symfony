<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ExerciceRepository")
 */
class Exercice
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Cours", inversedBy="exercice")
     */
    private $cours;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Resultat", mappedBy="resultat")
     */
    private $resultat;

    public function __construct()
    {
        $this->resultat = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getCours(): ?Cours
    {
        return $this->cours;
    }

    public function setCours(?Cours $cours): self
    {
        $this->cours = $cours;

        return $this;
    }

    /**
     * @return Collection|Resultat[]
     */
    public function getResultat(): Collection
    {
        return $this->resultat;
    }

    public function addResultat(Resultat $resultat): self
    {
        if (!$this->resultat->contains($resultat)) {
            $this->resultat[] = $resultat;
            $resultat->setResultat($this);
        }

        return $this;
    }

    public function removeResultat(Resultat $resultat): self
    {
        if ($this->resultat->contains($resultat)) {
            $this->resultat->removeElement($resultat);
            // set the owning side to null (unless already changed)
            if ($resultat->getResultat() === $this) {
                $resultat->setResultat(null);
            }
        }

        return $this;
    }
}
