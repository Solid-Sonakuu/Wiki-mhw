<?php

namespace App\Entity;

use App\Repository\ArmesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArmesRepository::class)
 */
class Armes
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
    private $attaque;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $rarete;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $affinitee;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $element;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $id_joyaux;

    /**
     * @ORM\ManyToMany(targetEntity=Monstre::class, mappedBy="armes")
     */
    private $monstres;

    /**
     * @ORM\ManyToMany(targetEntity=Joyaux::class, inversedBy="armes")
     */
    private $joyaux;

    public function __construct()
    {
        $this->monstres = new ArrayCollection();
        $this->joyaux = new ArrayCollection();
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

    public function getAttaque(): ?string
    {
        return $this->attaque;
    }

    public function setAttaque(string $attaque): self
    {
        $this->attaque = $attaque;

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

    public function getAffinitee(): ?string
    {
        return $this->affinitee;
    }

    public function setAffinitee(string $affinitee): self
    {
        $this->affinitee = $affinitee;

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

    public function getIdJoyaux(): ?string
    {
        return $this->id_joyaux;
    }

    public function setIdJoyaux(string $id_joyaux): self
    {
        $this->id_joyaux = $id_joyaux;

        return $this;
    }

    /**
     * @return Collection|Monstre[]
     */
    public function getMonstres(): Collection
    {
        return $this->monstres;
    }

    public function addMonstre(Monstre $monstre): self
    {
        if (!$this->monstres->contains($monstre)) {
            $this->monstres[] = $monstre;
            $monstre->addArme($this);
        }

        return $this;
    }

    public function removeMonstre(Monstre $monstre): self
    {
        if ($this->monstres->contains($monstre)) {
            $this->monstres->removeElement($monstre);
            $monstre->removeArme($this);
        }

        return $this;
    }

    /**
     * @return Collection|Joyaux[]
     */
    public function getJoyaux(): Collection
    {
        return $this->joyaux;
    }

    public function addJoyaux(Joyaux $joyaux): self
    {
        if (!$this->joyaux->contains($joyaux)) {
            $this->joyaux[] = $joyaux;
        }

        return $this;
    }

    public function removeJoyaux(Joyaux $joyaux): self
    {
        if ($this->joyaux->contains($joyaux)) {
            $this->joyaux->removeElement($joyaux);
        }

        return $this;
    }
}
