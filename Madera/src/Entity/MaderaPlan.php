<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MaderaPlanRepository")
 */
class MaderaPlan
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_plan;

    /**
     * @ORM\Column(type="date")
     */
    private $date_creation;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_derniere_modification;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $largeur_plan;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $longueur_plan;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prix_total_ht_plan;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prix_total_ttc_plan;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\MaderaToit", inversedBy="id_plan")
     */
    private $maderaToit;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\MaderaCoupe", inversedBy="id_plan")
     */
    private $maderaCoupe;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\MaderaSol", inversedBy="id_plan")
     */
    private $maderaSol;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\MaderaClient", inversedBy="id_projet")
     */
    private $maderaClient;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\MaderaProjet", inversedBy="id_plan")
     */
    private $maderaProjet;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\MaderaGamme", inversedBy="id_plan")
     */
    private $maderaGamme;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdPlan(): ?int
    {
        return $this->id_plan;
    }

    public function setIdPlan(int $id_plan): self
    {
        $this->id_plan = $id_plan;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->date_creation;
    }

    public function setDateCreation(\DateTimeInterface $date_creation): self
    {
        $this->date_creation = $date_creation;

        return $this;
    }

    public function getDateDerniereModification(): ?\DateTimeInterface
    {
        return $this->date_derniere_modification;
    }

    public function setDateDerniereModification(?\DateTimeInterface $date_derniere_modification): self
    {
        $this->date_derniere_modification = $date_derniere_modification;

        return $this;
    }

    public function getLargeurPlan(): ?int
    {
        return $this->largeur_plan;
    }

    public function setLargeurPlan(?int $largeur_plan): self
    {
        $this->largeur_plan = $largeur_plan;

        return $this;
    }

    public function getLongueurPlan(): ?int
    {
        return $this->longueur_plan;
    }

    public function setLongueurPlan(?int $longueur_plan): self
    {
        $this->longueur_plan = $longueur_plan;

        return $this;
    }

    public function getPrixTotalHtPlan(): ?float
    {
        return $this->prix_total_ht_plan;
    }

    public function setPrixTotalHtPlan(?float $prix_total_ht_plan): self
    {
        $this->prix_total_ht_plan = $prix_total_ht_plan;

        return $this;
    }

    public function getPrixTotalTtcPlan(): ?float
    {
        return $this->prix_total_ttc_plan;
    }

    public function setPrixTotalTtcPlan(?float $prix_total_ttc_plan): self
    {
        $this->prix_total_ttc_plan = $prix_total_ttc_plan;

        return $this;
    }

    public function getMaderaToit(): ?MaderaToit
    {
        return $this->maderaToit;
    }

    public function setMaderaToit(?MaderaToit $maderaToit): self
    {
        $this->maderaToit = $maderaToit;

        return $this;
    }

    public function getMaderaCoupe(): ?MaderaCoupe
    {
        return $this->maderaCoupe;
    }

    public function setMaderaCoupe(?MaderaCoupe $maderaCoupe): self
    {
        $this->maderaCoupe = $maderaCoupe;

        return $this;
    }

    public function getMaderaSol(): ?MaderaSol
    {
        return $this->maderaSol;
    }

    public function setMaderaSol(?MaderaSol $maderaSol): self
    {
        $this->maderaSol = $maderaSol;

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

    public function getMaderaProjet(): ?MaderaProjet
    {
        return $this->maderaProjet;
    }

    public function setMaderaProjet(?MaderaProjet $maderaProjet): self
    {
        $this->maderaProjet = $maderaProjet;

        return $this;
    }

    public function getMaderaGamme(): ?MaderaGamme
    {
        return $this->maderaGamme;
    }

    public function setMaderaGamme(?MaderaGamme $maderaGamme): self
    {
        $this->maderaGamme = $maderaGamme;

        return $this;
    }
}
