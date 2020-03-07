<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MaderaSolRepository")
 */
class MaderaSol
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
    private $nom_sol;

    /**
     * @ORM\Column(type="float")
     */
    private $prix_ht_sol;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\MaderaPlan", mappedBy="maderaSol")
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

    /**
     * @return mixed
     */
    public function getNomSol()
    {
        return $this->nom_sol;
    }

    /**
     * @param mixed $nom_sol
     */
    public function setNomSol($nom_sol): void
    {
        $this->nom_sol = $nom_sol;
    }

    public function getPrixHtSol(): ?float
    {
        return $this->prix_ht_sol;
    }

    public function setPrixHtSol(float $prix_ht_sol): self
    {
        $this->prix_ht_sol = $prix_ht_sol;

        return $this;
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
            $idPlan->setMaderaSol($this);
        }

        return $this;
    }

    public function removeIdPlan(MaderaPlan $idPlan): self
    {
        if ($this->id_plan->contains($idPlan)) {
            $this->id_plan->removeElement($idPlan);
            // set the owning side to null (unless already changed)
            if ($idPlan->getMaderaSol() === $this) {
                $idPlan->setMaderaSol(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getNomSol();
    }
}
