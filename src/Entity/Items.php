<?php

namespace App\Entity;

use App\Repository\ItemsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ItemsRepository::class)
 */
class Items
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $rarete;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $effets;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $recette;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $prix;

    /**
     * @ORM\ManyToMany(targetEntity=Cartes::class, mappedBy="items")
     */
    private $cartes;

    public function __construct()
    {
        $this->cartes = new ArrayCollection();
    }

    public function getId(): ?int
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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getRarete(): ?string
    {
        return $this->rarete;
    }

    public function setRarete(string $rarete): self
    {
        $this->rarete = $rarete;

        return $this;
    }

    public function getEffets(): ?string
    {
        return $this->effets;
    }

    public function setEffets(string $effets): self
    {
        $this->effets = $effets;

        return $this;
    }

    public function getRecette(): ?string
    {
        return $this->recette;
    }

    public function setRecette(string $recette): self
    {
        $this->recette = $recette;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * @return Collection|Cartes[]
     */
    public function getCartes(): Collection
    {
        return $this->cartes;
    }

    public function addCarte(Cartes $carte): self
    {
        if (!$this->cartes->contains($carte)) {
            $this->cartes[] = $carte;
            $carte->addItem($this);
        }

        return $this;
    }

    public function removeCarte(Cartes $carte): self
    {
        if ($this->cartes->contains($carte)) {
            $this->cartes->removeElement($carte);
            $carte->removeItem($this);
        }

        return $this;
    }
    public function __toString():string {

        return $this->nom ;
    }

}
