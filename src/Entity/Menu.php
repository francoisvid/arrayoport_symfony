<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MenuRepository")
 */
class Menu
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
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\Column(type="text")
     */
    private $description;



    /**
     * @ORM\Column(type="boolean")
     */
    private $statut;



    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Carte", inversedBy="category")
     */
    private $carte;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Article", mappedBy="menu")
     */
    private $category;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Commentaire", mappedBy="menu")
     */
    private $contenu;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $alergene;

    public function __construct()
    {
        $this->category = new ArrayCollection();
        $this->contenu = new ArrayCollection();
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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getStatut(): ?bool
    {
        return $this->statut;
    }

    public function setStatut(bool $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getCarte(): ?Carte
    {
        return $this->carte;
    }

    public function setCarte(?Carte $carte): self
    {
        $this->carte = $carte;

        return $this;
    }

    /**
     * @return Collection|Article[]
     */
    public function getCategory(): Collection
    {
        return $this->category;
    }

    public function addCategory(Article $category): self
    {
        if (!$this->category->contains($category)) {
            $this->category[] = $category;
            $category->setMenu($this);
        }

        return $this;
    }

    public function removeCategory(Article $category): self
    {
        if ($this->category->contains($category)) {
            $this->category->removeElement($category);
            // set the owning side to null (unless already changed)
            if ($category->getMenu() === $this) {
                $category->setMenu(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Commentaire[]
     */
    public function getContenu(): Collection
    {
        return $this->contenu;
    }

    public function addContenu(Commentaire $contenu): self
    {
        if (!$this->contenu->contains($contenu)) {
            $this->contenu[] = $contenu;
            $contenu->setMenu($this);
        }

        return $this;
    }

    public function removeContenu(Commentaire $contenu): self
    {
        if ($this->contenu->contains($contenu)) {
            $this->contenu->removeElement($contenu);
            // set the owning side to null (unless already changed)
            if ($contenu->getMenu() === $this) {
                $contenu->setMenu(null);
            }
        }

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getAlergene(): ?string
    {
        return $this->alergene;
    }

    public function setAlergene(?string $alergene): self
    {
        $this->alergene = $alergene;

        return $this;
    }

}
