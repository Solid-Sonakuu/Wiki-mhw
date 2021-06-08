<?php

namespace App\Entity;

use App\Repository\MonstreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MonstreRepository::class)
 */
class Monstre
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
     * @ORM\Column(type="text")
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $element;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $faiblesses;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $resistances;

    /**
     * @ORM\ManyToMany(targetEntity=Cartes::class, mappedBy="monstre")
     */
    private $cartes;

    /**
     * @ORM\ManyToMany(targetEntity=Armes::class, inversedBy="monstres")
     */
    private $armes;

    /**
     * @ORM\Column(type="integer")
     */
    private $arme_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $armure_id;

    public function __construct()
    {
        $this->cartes = new ArrayCollection();
        $this->armes = new ArrayCollection();
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

    public function getElement(): ?string
    {
        return $this->element;
    }

    public function setElement(string $element): self
    {
        $this->element = $element;

        return $this;
    }

    public function getFaiblesses(): ?string
    {
        return $this->faiblesses;
    }

    public function setFaiblesses(string $faiblesses): self
    {
        $this->faiblesses = $faiblesses;

        return $this;
    }

    public function getResistances(): ?string
    {
        return $this->resistances;
    }

    public function setResistances(string $resistances): self
    {
        $this->resistances = $resistances;

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
            $carte->addMonstre($this);
        }

        return $this;
    }

    public function removeCarte(Cartes $carte): self
    {
        if ($this->cartes->contains($carte)) {
            $this->cartes->removeElement($carte);
            $carte->removeMonstre($this);
        }

        return $this;
    }

    public function getArmureId(): ?int
    {
        return $this->armure_id;
    }

    public function setArmureId(int $armure_id): self
    {
        $this->armure_id = $armure_id;

        return $this;
    }
    

    /**
     * @return Collection|Armes[]
     */
    public function getArmes(): Collection
    {
        return $this->armes;
    }

    public function addArme(Armes $arme): self
    {
        if (!$this->armes->contains($arme)) {
            $this->armes[] = $arme;
        }

        return $this;
    }

    public function removeArme(Armes $arme): self
    {
        if ($this->armes->contains($arme)) {
            $this->armes->removeElement($arme);
        }

        return $this;
    }

    public function getMonstre(): ?string
    {
        return $this->monstre;
    }

    public function setMonstre(string $monstre): self
    {
        $this->monstre = $monstre;

        return $this; 
    }

    public function getArmeId(): ?int
    {
        return $this->arme_id;
    }

    public function setArmeId(int $arme_id): self
    {
        $this->arme_id = $arme_id;

        return $this;
    }
}
