<?php

namespace App\Entity;

use App\Repository\TalentsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TalentsRepository::class)
 */
class Talents
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
    private $niveau;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $effets;

    /**
     * @ORM\ManyToMany(targetEntity=Joyaux::class, mappedBy="talents")
     */
    private $joyaux;

    /**
     * @ORM\ManyToMany(targetEntity=Armure::class, mappedBy="talents")
     */
    private $armures;

    public function __construct()
    {
        $this->joyaux = new ArrayCollection();
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
            $joyaux->addTalent($this);
        }

        return $this;
    }

    public function removeJoyaux(Joyaux $joyaux): self
    {
        if ($this->joyaux->contains($joyaux)) {
            $this->joyaux->removeElement($joyaux);
            $joyaux->removeTalent($this);
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
            $armure->addTalent($this);
        }

        return $this;
    }

    public function removeArmure(Armure $armure): self
    {
        if ($this->armures->contains($armure)) {
            $this->armures->removeElement($armure);
            $armure->removeTalent($this);
        }

        return $this;
    }
}
