<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MaderaToitRepository")
 */
class MaderaToit
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
    private $nom_toit;

    /**
     * @ORM\Column(type="float")
     */
    private $prix_ht_toit;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\MaderaPlan", mappedBy="maderaToit")
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
    public function getNomToit()
    {
        return $this->nom_toit;
    }

    /**
     * @param mixed $nom_toit
     */
    public function setNomToit($nom_toit): void
    {
        $this->nom_toit = $nom_toit;
    }

    /**
    public function setIdToit(int $id_toit): self
    {
        $this->id_toit = $id_toit;

        return $this;
    }

    public function getPrixHtToit(): ?float
    {
        return $this->prix_ht_toit;
    }

    public function setPrixHtToit(float $prix_ht_toit): self
    {
        $this->prix_ht_toit = $prix_ht_toit;

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
            $idPlan->setMaderaToit($this);
        }

        return $this;
    }

    public function removeIdPlan(MaderaPlan $idPlan): self
    {
        if ($this->id_plan->contains($idPlan)) {
            $this->id_plan->removeElement($idPlan);
            // set the owning side to null (unless already changed)
            if ($idPlan->getMaderaToit() === $this) {
                $idPlan->setMaderaToit(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getNomToit();
    }
}
