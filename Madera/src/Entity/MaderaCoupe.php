<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MaderaCoupeRepository")
 */
class MaderaCoupe
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
    private $nom_coupe;
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $longueur_coupe;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $largeur_coupe;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\MaderaPlan", mappedBy="maderaCoupe")
     */
    private $id_plan;

    public function __construct()
    {
        $this->id_plan = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLongueurCoupe(): ?int
    {
        return $this->longueur_coupe;
    }

    public function setLongueurCoupe(?int $longueur_coupe): self
    {
        $this->longueur_coupe = $longueur_coupe;

        return $this;
    }

    public function getLargeurCoupe(): ?int
    {
        return $this->largeur_coupe;
    }

    public function setLargeurCoupe(?int $largeur_coupe): self
    {
        $this->largeur_coupe = $largeur_coupe;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNomCoupe()
    {
        return $this->nom_coupe;
    }

    /**
     * @param mixed $nom_coupe
     */
    public function setNomCoupe($nom_coupe): void
    {
        $this->nom_coupe = $nom_coupe;
    }

    /**
     * @return Collection|MaderaPlan[]
     */
    public function getIdPlan(): Collection
    {
        return $this->id_plan;
    }

    public function addIdPlan(MaderaPlan $idPlan): self
    {
        if (!$this->id_plan->contains($idPlan)) {
            $this->id_plan[] = $idPlan;
            $idPlan->setMaderaCoupe($this);
        }

        return $this;
    }

    public function removeIdPlan(MaderaPlan $idPlan): self
    {
        if ($this->id_plan->contains($idPlan)) {
            $this->id_plan->removeElement($idPlan);
            // set the owning side to null (unless already changed)
            if ($idPlan->getMaderaCoupe() === $this) {
                $idPlan->setMaderaCoupe(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return 'Sol :'.$this->getNomCoupe();
    }
}
