<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MaderaCommercialRepository")
 */
class MaderaCommercial
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
    private $id_commercial;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $prenom_commercial;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nom_commercial;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $mot_de_passe_commercial;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\MaderaProjet", mappedBy="maderaCommercial")
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

    public function getIdCommercial(): ?int
    {
        return $this->id_commercial;
    }

    public function setIdCommercial(int $id_commercial): self
    {
        $this->id_commercial = $id_commercial;

        return $this;
    }

    public function getPrenomCommercial(): ?string
    {
        return $this->prenom_commercial;
    }

    public function setPrenomCommercial(string $prenom_commercial): self
    {
        $this->prenom_commercial = $prenom_commercial;

        return $this;
    }

    public function getNomCommercial(): ?string
    {
        return $this->nom_commercial;
    }

    public function setNomCommercial(string $nom_commercial): self
    {
        $this->nom_commercial = $nom_commercial;

        return $this;
    }

    public function getMotDePasseCommercial(): ?string
    {
        return $this->mot_de_passe_commercial;
    }

    public function setMotDePasseCommercial(string $mot_de_passe_commercial): self
    {
        $this->mot_de_passe_commercial = $mot_de_passe_commercial;

        return $this;
    }

    /**
     * @return Collection|MaderaProjet[]
     */
    public function getIdProjet(): Collection
    {
        return $this->id_projet;
    }

    public function addIdProjet(MaderaProjet $idProjet): self
    {
        if (!$this->id_projet->contains($idProjet)) {
            $this->id_projet[] = $idProjet;
            $idProjet->setMaderaCommercial($this);
        }

        return $this;
    }

    public function removeIdProjet(MaderaProjet $idProjet): self
    {
        if ($this->id_projet->contains($idProjet)) {
            $this->id_projet->removeElement($idProjet);
            // set the owning side to null (unless already changed)
            if ($idProjet->getMaderaCommercial() === $this) {
                $idProjet->setMaderaCommercial(null);
            }
        }

        return $this;
    }
}
