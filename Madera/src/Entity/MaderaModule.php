<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MaderaModuleRepository")
 */
class MaderaModule
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
    private $nom_module;

    /**
     * @ORM\Column(type="integer")
     */
    private $prix_ht_module;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantite_restante_module;

    /**
     * @ORM\Column(type="integer")
     */
    private $coordonnee_x_debut_module;

    /**
     * @ORM\Column(type="integer")
     */
    private $coordonnee_x_fin_module;

    /**
     * @ORM\Column(type="integer")
     */
    private $coordonnee_y_debut_module;

    /**
     * @ORM\Column(type="integer")
     */
    private $coordonnee_y_fin_module;

    /**
     * @ORM\Column(type="integer")
     */
    private $largeur_module;

    /**
     * @ORM\Column(type="integer")
     */
    private $longueur_module;

    /**
     * @ORM\Column(type="integer")
     */
    private $nb_composant_module;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $gamme_module;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\MaderaComposant", inversedBy="maderaModules")
     */
    private $composants;

    public function __construct()
    {
        $this->composants = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomModule(): ?string
    {
        return $this->nom_module;
    }

    public function setNomModule(string $nom_module): self
    {
        $this->nom_module = $nom_module;

        return $this;
    }

    public function getPrixHtModule(): ?int
    {
        return $this->prix_ht_module;
    }

    public function setPrixHtModule(int $prix_ht_module): self
    {
        $this->prix_ht_module = $prix_ht_module;

        return $this;
    }

    public function getQuantiteRestanteModule(): ?int
    {
        return $this->quantite_restante_module;
    }

    public function setQuantiteRestanteModule(int $quantite_restante_module): self
    {
        $this->quantite_restante_module = $quantite_restante_module;

        return $this;
    }

    public function getCoordonneeXDebutModule(): ?int
    {
        return $this->coordonnee_x_debut_module;
    }

    public function setCoordonneeXDebutModule(int $coordonnee_x_debut_module): self
    {
        $this->coordonnee_x_debut_module = $coordonnee_x_debut_module;

        return $this;
    }

    public function getCoordonneeXFinModule(): ?int
    {
        return $this->coordonnee_x_fin_module;
    }

    public function setCoordonneeXFinModule(int $coordonnee_x_fin_module): self
    {
        $this->coordonnee_x_fin_module = $coordonnee_x_fin_module;

        return $this;
    }

    public function getCoordonneeYDebutModule(): ?int
    {
        return $this->coordonnee_y_debut_module;
    }

    public function setCoordonneeYDebutModule(int $coordonnee_y_debut_module): self
    {
        $this->coordonnee_y_debut_module = $coordonnee_y_debut_module;

        return $this;
    }

    public function getCoordonneeYFinModule(): ?int
    {
        return $this->coordonnee_y_fin_module;
    }

    public function setCoordonneeYFinModule(int $coordonnee_y_fin_module): self
    {
        $this->coordonnee_y_fin_module = $coordonnee_y_fin_module;

        return $this;
    }

    public function getLargeurModule(): ?int
    {
        return $this->largeur_module;
    }

    public function setLargeurModule(int $largeur_module): self
    {
        $this->largeur_module = $largeur_module;

        return $this;
    }

    public function getLongueurModule(): ?int
    {
        return $this->longueur_module;
    }

    public function setLongueurModule(int $longueur_module): self
    {
        $this->longueur_module = $longueur_module;

        return $this;
    }

    public function getNbComposantModule(): ?int
    {
        return $this->nb_composant_module;
    }

    public function setNbComposantModule(int $nb_composant_module): self
    {
        $this->nb_composant_module = $nb_composant_module;

        return $this;
    }

    public function getGammeModule(): ?string
    {
        return $this->gamme_module;
    }

    public function setGammeModule(string $gamme_module): self
    {
        $this->gamme_module = $gamme_module;

        return $this;
    }

    /**
     * @return Collection|MaderaComposant[]
     */
    public function getComposants(): Collection
    {
        return $this->composants;
    }

    public function addComposant(MaderaComposant $composant): self
    {
        if (!$this->composants->contains($composant)) {
            $this->composants[] = $composant;
        }

        return $this;
    }

    public function removeComposant(MaderaComposant $composant): self
    {
        if ($this->composants->contains($composant)) {
            $this->composants->removeElement($composant);
        }

        return $this;
    }
}
