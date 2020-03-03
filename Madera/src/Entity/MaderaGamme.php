<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MaderaGammeRepository")
 */
class MaderaGamme
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $type_isolant;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $type_couverture;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $qualite_huisserie;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\MaderaPlan", mappedBy="maderaGamme")
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

    public function getTypeIsolant(): ?string
    {
        return $this->type_isolant;
    }

    public function setTypeIsolant(string $type_isolant): self
    {
        $this->type_isolant = $type_isolant;

        return $this;
    }

    public function getTypeCouverture(): ?string
    {
        return $this->type_couverture;
    }

    public function setTypeCouverture(string $type_couverture): self
    {
        $this->type_couverture = $type_couverture;

        return $this;
    }

    public function getQualiteHuisserie(): ?string
    {
        return $this->qualite_huisserie;
    }

    public function setQualiteHuisserie(string $qualite_huisserie): self
    {
        $this->qualite_huisserie = $qualite_huisserie;

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
            $idPlan->setMaderaGamme($this);
        }

        return $this;
    }

    public function removeIdPlan(MaderaPlan $idPlan): self
    {
        if ($this->id_plan->contains($idPlan)) {
            $this->id_plan->removeElement($idPlan);
            // set the owning side to null (unless already changed)
            if ($idPlan->getMaderaGamme() === $this) {
                $idPlan->setMaderaGamme(null);
            }
        }

        return $this;
    }
}
