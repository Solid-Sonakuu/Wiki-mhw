<?php

namespace App\Entity;

use App\Repository\ArmureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArmureRepository::class)
 */
class Armure
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
    private $defense;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $rarete;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $id_talent;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $id_joyaux;

    /**
     * @ORM\OneToMany(targetEntity=Monstre::class, mappedBy="armure")
     */
    private $monstres;

    /**
     * @ORM\ManyToMany(targetEntity=Joyaux::class, inversedBy="armures")
     */
    private $joyaux;

    /**
     * @ORM\ManyToMany(targetEntity=Talents::class, inversedBy="armures")
     */
    private $talents;

    public function __construct()
    {
        $this->monstres = new ArrayCollection();
        $this->joyaux = new ArrayCollection();
        $this->talents = new ArrayCollection();
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

    public function getDefense(): ?string
    {
        return $this->defense;
    }

    public function setDefense(string $defense): self
    {
        $this->defense = $defense;

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

    public function getIdTalent(): ?string
    {
        return $this->id_talent;
    }

    public function setIdTalent(string $id_talent): self
    {
        $this->id_talent = $id_talent;

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
            $monstre->setArmureId;
        }

        return $this;
    }

    public function removeMonstre(Monstre $monstre): self
    {
        if ($this->monstres->contains($monstre)) {
            $this->monstres->removeElement($monstre);
            // set the owning side to null (unless already changed)
            if ($monstre->getArmureId() === $this) {
                $monstre->setArmureId ;
            }
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
}
