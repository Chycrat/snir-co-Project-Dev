<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MaderaClientRepository")
 */
class MaderaClient
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
    private $id_client;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_client;

    /**
     * @ORM\Column(type="integer")
     */
    private $code_client;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $mdp_client;

    /**
     * @ORM\Column(type="integer")
     */
    private $telephone_client;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse_client;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email_client;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\MaderaPlan", mappedBy="maderaClient")
     */
    private $id_projet;

    public function __construct()
    {
        $this->id_projet = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdClient(): ?int
    {
        return $this->id_client;
    }

    public function setIdClient(int $id_client): self
    {
        $this->id_client = $id_client;

        return $this;
    }

    public function getNomClient(): ?string
    {
        return $this->nom_client;
    }

    public function setNomClient(string $nom_client): self
    {
        $this->nom_client = $nom_client;

        return $this;
    }

    public function getCodeClient(): ?int
    {
        return $this->code_client;
    }

    public function setCodeClient(int $code_client): self
    {
        $this->code_client = $code_client;

        return $this;
    }

    public function getMdpClient(): ?string
    {
        return $this->mdp_client;
    }

    public function setMdpClient(string $mdp_client): self
    {
        $this->mdp_client = $mdp_client;

        return $this;
    }

    public function getTelephoneClient(): ?int
    {
        return $this->telephone_client;
    }

    public function setTelephoneClient(int $telephone_client): self
    {
        $this->telephone_client = $telephone_client;

        return $this;
    }

    public function getAdresseClient(): ?string
    {
        return $this->adresse_client;
    }

    public function setAdresseClient(string $adresse_client): self
    {
        $this->adresse_client = $adresse_client;

        return $this;
    }

    public function getEmailClient(): ?string
    {
        return $this->email_client;
    }

    public function setEmailClient(string $email_client): self
    {
        $this->email_client = $email_client;

        return $this;
    }

    /**
     * @return Collection|MaderaPlan[]
     */
    public function getIdProjet(): Collection
    {
        return $this->id_projet;
    }

    public function addIdProjet(MaderaPlan $idProjet): self
    {
        if (!$this->id_projet->contains($idProjet)) {
            $this->id_projet[] = $idProjet;
            $idProjet->setMaderaClient($this);
        }

        return $this;
    }

    public function removeIdProjet(MaderaPlan $idProjet): self
    {
        if ($this->id_projet->contains($idProjet)) {
            $this->id_projet->removeElement($idProjet);
            // set the owning side to null (unless already changed)
            if ($idProjet->getMaderaClient() === $this) {
                $idProjet->setMaderaClient(null);
            }
        }

        return $this;
    }

}
