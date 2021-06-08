<?php

namespace App\Entity;

use App\Repository\JoyauxRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=JoyauxRepository::class)
 */
class Joyaux
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
    private $rarete;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $niveau;

    /**
     * @ORM\Column(type="text")
     */
    private $effets;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $id_talent;

    /**
     * @ORM\ManyToMany(targetEntity=Armes::class, mappedBy="joyaux")
     */
    private $armes;

    /**
     * @ORM\ManyToMany(targetEntity=Talents::class, inversedBy="joyaux")
     */
    private $talents;

    /**
     * @ORM\ManyToMany(targetEntity=Armure::class, mappedBy="joyaux")
     */
    private $armures;

    public function __construct()
    {
        $this->armes = new ArrayCollection();
        $this->talents = new ArrayCollection();
        $this->armures = new ArrayCollection();
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

    public function getRarete(): ?string
    {
        return $this->rarete;
    }

    public function setRarete(string $rarete): self
    {
        $this->rarete = $rarete;

        return $this;
    }

    public function getNiveau(): ?string
    {
        return $this->niveau;
    }

    public function setNiveau(string $niveau): self
    {
        $this->niveau = $niveau;

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

    public function getIdTalent(): ?string
    {
        return $this->id_talent;
    }

    public function setIdTalent(string $id_talent): self
    {
        $this->id_talent = $id_talent;

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
            $arme->addJoyaux($this);
        }

        return $this;
    }

    public function removeArme(Armes $arme): self
    {
        if ($this->armes->contains($arme)) {
            $this->armes->removeElement($arme);
            $arme->removeJoyaux($this);
        }

        return $this;
    }

    /**
     * @return Collection|Talents[]
     */
    public function getTalents(): Collection
    {
        return $this->talents;
    }

    public function addTalent(Talents $talent): self
    {
        if (!$this->talents->contains($talent)) {
            $this->talents[] = $talent;
        }

        return $this;
    }

    public function removeTalent(Talents $talent): self
    {
        if ($this->talents->contains($talent)) {
            $this->talents->removeElement($talent);
        }

        return $this;
    }

    /**
     * @return Collection|Armure[]
     */
    public function getArmures(): Collection
    {
        return $this->armures;
    }

    public function addArmure(Armure $armure): self
    {
        if (!$this->armures->contains($armure)) {
            $this->armures[] = $armure;
            $armure->addJoyaux($this);
        }

        return $this;
    }

    public function removeArmure(Armure $armure): self
    {
        if ($this->armures->contains($armure)) {
            $this->armures->removeElement($armure);
            $armure->removeJoyaux($this);
        }

        return $this;
    }
}
