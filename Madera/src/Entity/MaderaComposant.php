<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MaderaComposantRepository")
 */
class MaderaComposant
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
    private $id_composant;

    /**
     * @ORM\Column(type="integer")
     */
    private $code_composant;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_composant;

    /**
     * @ORM\Column(type="float")
     */
    private $prix_composant;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantite_restante_composant;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nature_composant;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\MaderaModule", mappedBy="composants")
     */
    private $maderaModules;

    public function __construct()
    {
        $this->maderaModules = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdComposant(): ?int
    {
        return $this->id_composant;
    }

    public function setIdComposant(int $id_composant): self
    {
        $this->id_composant = $id_composant;

        return $this;
    }

    public function getCodeComposant(): ?int
    {
        return $this->code_composant;
    }

    public function setCodeComposant(int $code_composant): self
    {
        $this->code_composant = $code_composant;

        return $this;
    }

    public function getNomComposant(): ?string
    {
        return $this->nom_composant;
    }

    public function setNomComposant(string $nom_composant): self
    {
        $this->nom_composant = $nom_composant;

        return $this;
    }

    public function getPrixComposant(): ?float
    {
        return $this->prix_composant;
    }

    public function setPrixComposant(float $prix_composant): self
    {
        $this->prix_composant = $prix_composant;

        return $this;
    }

    public function getQuantiteRestanteComposant(): ?int
    {
        return $this->quantite_restante_composant;
    }

    public function setQuantiteRestanteComposant(int $quantite_restante_composant): self
    {
        $this->quantite_restante_composant = $quantite_restante_composant;

        return $this;
    }

    public function getNatureComposant(): ?string
    {
        return $this->nature_composant;
    }

    public function setNatureComposant(string $nature_composant): self
    {
        $this->nature_composant = $nature_composant;

        return $this;
    }

    /**
     * @return Collection|MaderaModule[]
     */
    public function getMaderaModules(): Collection
    {
        return $this->maderaModules;
    }

    public function addMaderaModule(MaderaModule $maderaModule): self
    {
        if (!$this->maderaModules->contains($maderaModule)) {
            $this->maderaModules[] = $maderaModule;
            $maderaModule->addComposant($this);
        }

        return $this;
    }

    public function removeMaderaModule(MaderaModule $maderaModule): self
    {
        if ($this->maderaModules->contains($maderaModule)) {
            $this->maderaModules->removeElement($maderaModule);
            $maderaModule->removeComposant($this);
        }

        return $this;
    }
}
