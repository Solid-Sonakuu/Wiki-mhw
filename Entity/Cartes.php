<?php

namespace App\Entity;

use App\Repository\CartesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CartesRepository::class)
 */
class Cartes
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
     * @ORM\Column(type="string", length=100)
     */
    private $campement;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nombre_de_secteur;

    
    /**
     * @ORM\ManyToMany(targetEntity=Items::class, inversedBy="cartes")
     */
    private $items;

    /**
     * @ORM\ManyToMany(targetEntity=Monstre::class, inversedBy="cartes")
     */
    private $monstre;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_monstres;


    public function __construct()
    {
        $this->items = new ArrayCollection();
        $this->monstre = new ArrayCollection();
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

    public function getCampement(): ?string
    {
        return $this->campement;
    }

    public function setCampement(string $campement): self
    {
        $this->campement = $campement;

        return $this;
    }

    public function getNombreDeSecteur(): ?string
    {
        return $this->nombre_de_secteur;
    }

    public function setNombreDeSecteur(string $nombre_de_secteur): self
    {
        $this->nombre_de_secteur = $nombre_de_secteur;

        return $this;
    }

    /**
     * @return Collection|Items[]
     */
    public function getItems(): Collection
    {
        return $this->items;
    }

    public function addItem(Items $item): self
    {
        if (!$this->items->contains($item)) {
            $this->items[] = $item;
        }

        return $this;
    }

    public function removeItem(Items $item): self
    {
        if ($this->items->contains($item)) {
            $this->items->removeElement($item);
        }

        return $this;
    }

    /**
     * @return Collection|Monstre[]
     */
    public function getMonstre(): Collection
    {
        return $this->monstre;
    }

    public function addMonstre(Monstre $monstre): self
    {
        if (!$this->monstre->contains($monstre)) {
            $this->monstre[] = $monstre;
        }

        return $this;
    }

    public function removeMonstre(Monstre $monstre): self
    {
        if ($this->monstre->contains($monstre)) {
            $this->monstre->removeElement($monstre);
        }

        return $this;
 
    }


    public function __toString():string {

        return $this->nom ;
}

    public function getIdMonstres(): ?int
    {
        return $this->id_monstres;
    }

    public function setIdMonstres(int $id_monstres): self
    {
        $this->id_monstres = $id_monstres;

        return $this;
    }

}
 