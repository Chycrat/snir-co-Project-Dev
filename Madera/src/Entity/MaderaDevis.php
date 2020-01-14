<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MaderaDevisRepository")
 */
class MaderaDevis
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
    private $id_devis;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $code_devis;

    /**
     * @ORM\Column(type="date")
     */
    private $date_devis;

    /**
     * @ORM\Column(type="date")
     */
    private $date_validation;

    /**
     * @ORM\Column(type="float")
     */
    private $montant_ht_devis;

    /**
     * @ORM\Column(type="float")
     */
    private $montant_ttc_devis;

    /**
     * @ORM\Column(type="integer")
     */
    private $marge_commerciaux_devis;

    /**
     * @ORM\Column(type="integer")
     */
    private $marge_entreprise_devis;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\MaderaClient", cascade={"persist", "remove"})
     */
    private $client_devis;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdDevis(): ?int
    {
        return $this->id_devis;
    }

    public function setIdDevis(int $id_devis): self
    {
        $this->id_devis = $id_devis;

        return $this;
    }

    public function getCodeDevis(): ?string
    {
        return $this->code_devis;
    }

    public function setCodeDevis(string $code_devis): self
    {
        $this->code_devis = $code_devis;

        return $this;
    }

    public function getDateDevis(): ?\DateTimeInterface
    {
        return $this->date_devis;
    }

    public function setDateDevis(\DateTimeInterface $date_devis): self
    {
        $this->date_devis = $date_devis;

        return $this;
    }

    public function getDateValidation(): ?\DateTimeInterface
    {
        return $this->date_validation;
    }

    public function setDateValidation(\DateTimeInterface $date_validation): self
    {
        $this->date_validation = $date_validation;

        return $this;
    }

    public function getMontantHtDevis(): ?float
    {
        return $this->montant_ht_devis;
    }

    public function setMontantHtDevis(float $montant_ht_devis): self
    {
        $this->montant_ht_devis = $montant_ht_devis;

        return $this;
    }

    public function getMontantTtcDevis(): ?float
    {
        return $this->montant_ttc_devis;
    }

    public function setMontantTtcDevis(float $montant_ttc_devis): self
    {
        $this->montant_ttc_devis = $montant_ttc_devis;

        return $this;
    }

    public function getMargeCommerciauxDevis(): ?int
    {
        return $this->marge_commerciaux_devis;
    }

    public function setMargeCommerciauxDevis(int $marge_commerciaux_devis): self
    {
        $this->marge_commerciaux_devis = $marge_commerciaux_devis;

        return $this;
    }

    public function getMargeEntrepriseDevis(): ?int
    {
        return $this->marge_entreprise_devis;
    }

    public function setMargeEntrepriseDevis(int $marge_entreprise_devis): self
    {
        $this->marge_entreprise_devis = $marge_entreprise_devis;

        return $this;
    }

    public function getClientDevis(): ?MaderaClient
    {
        return $this->client_devis;
    }

    public function setClientDevis(?MaderaClient $client_devis): self
    {
        $this->client_devis = $client_devis;

        return $this;
    }
}
