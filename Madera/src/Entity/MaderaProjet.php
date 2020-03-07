<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MaderaProjetRepository")
 */
class MaderaProjet
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
    private $nom_projet;

    /**
     * @ORM\Column(type="date")
     */
    private $date_creation_projet;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_modification_projet;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\MaderaPlan", mappedBy="maderaProjet")
     */
    private $id_plan;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\MaderaCommercial", inversedBy="id_projet")
     */
    private $maderaCommercial;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\MaderaClient", inversedBy="id_projet")
     */
    private $maderaClient;

    public function __construct()
    {
        $this->id_plan = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomProjet(): ?string
    {
        return $this->nom_projet;
    }

    public function setNomProjet(string $nom_projet): self
    {
        $this->nom_projet = $nom_projet;

        return $this;
    }

    public function getDateCreationProjet(): ?\DateTimeInterface
    {
        return $this->date_creation_projet;
    }

    public function setDateCreationProjet(\DateTimeInterface $date_creation_projet): self
    {
        $this->date_creation_projet = $date_creation_projet;

        return $this;
    }

    public function getDateModificationProjet(): ?\DateTimeInterface
    {
        return $this->date_modification_projet;
    }

    public function setDateModificationProjet(?\DateTimeInterface $date_modification_projet): self
    {
        $this->date_modification_projet = $date_modification_projet;

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
            $idPlan->setMaderaProjet($this);
        }

        return $this;
    }

    public function removeIdPlan(MaderaPlan $idPlan): self
    {
        if ($this->id_plan->contains($idPlan)) {
            $this->id_plan->removeElement($idPlan);
            // set the owning side to null (unless already changed)
            if ($idPlan->getMaderaProjet() === $this) {
                $idPlan->setMaderaProjet(null);
            }
        }

        return $this;
    }

    public function getMaderaCommercial(): ?MaderaCommercial
    {
        return $this->maderaCommercial;
    }

    public function setMaderaCommercial(?MaderaCommercial $maderaCommercial): self
    {
        $this->maderaCommercial = $maderaCommercial;

        return $this;
    }

    public function getMaderaClient(): ?MaderaClient
    {
        return $this->maderaClient;
    }

    public function setMaderaClient(?MaderaClient $maderaClient): self
    {
        $this->maderaClient = $maderaClient;

        return $this;
    }
}
