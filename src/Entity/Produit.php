<?php

namespace App\Entity;

use App\Entity\SsRubrique;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ProduitRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: ProduitRepository::class)]
class Produit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nom = null;

    #[ORM\Column(length: 100)]
    private ?string $description = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $prix = null;

    #[ORM\Column]
    private ?bool $active = null;

    #[ORM\Column]
    private ?int $stock = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $coef = null;

    #[ORM\Column(length: 50)]
    private ?string $reference = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $photo = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Fournisseur $fournisseur = null;

    #[ORM\ManyToMany(targetEntity: Commande::class, mappedBy: 'produit')]
    private Collection $commandes;


    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_creation = null;

    #[ORM\ManyToOne(inversedBy: 'produits')]
    private ?SsRubrique $rubrique = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_scientifique = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_commun = null;

    #[ORM\Column(length: 255)]
    private ?string $origine = null;

    #[ORM\Column(length: 255)]
    private ?string $famille = null;

    #[ORM\Column(length: 255)]
    private ?string $ph = null;

    #[ORM\Column(length: 255)]
    private ?string $temperature = null;

    #[ORM\Column(length: 255)]
    private ?string $taille = null;


    public function __construct()
    {
        $this->commandes = new ArrayCollection();
        
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function isActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;$this->ssRubrique = new ArrayCollection();

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    public function getCoef(): ?string
    {
        return $this->coef;
    }

    public function setCoef(string $coef): self
    {
        $this->coef = $coef;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getFournisseur(): ?Fournisseur
    {
        return $this->fournisseur;
    }

    public function setFournisseur(?Fournisseur $fournisseur): self
    {
        $this->fournisseur = $fournisseur;

        return $this;
    }

    /**
     * @return Collection<int, Commande>
     */
    public function getCommandes(): Collection
    {
        return $this->commandes;
    }

    public function addCommande(Commande $commande): self
    {
        if (!$this->commandes->contains($commande)) {
            $this->commandes->add($commande);
            $commande->addProduit($this);
        }

        return $this;
    }

    public function removeCommande(Commande $commande): self
    {
        if ($this->commandes->removeElement($commande)) {
            $commande->removeProduit($this);
        }

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

    public function getRubrique(): ?SsRubrique
    {
        return $this->rubrique;
    }

    public function setRubrique(?SsRubrique $rubrique): self
    {
        $this->rubrique = $rubrique;

        return $this;
    }

    public function getNomScientifique(): ?string
    {
        return $this->nom_scientifique;
    }

    public function setNomScientifique(string $nom_scientifique): self
    {
        $this->nom_scientifique = $nom_scientifique;

        return $this;
    }

    public function getNomCommun(): ?string
    {
        return $this->nom_commun;
    }

    public function setNomCommun(string $nom_commun): self
    {
        $this->nom_commun = $nom_commun;

        return $this;
    }

    public function getOrigine(): ?string
    {
        return $this->origine;
    }

    public function setOrigine(string $origine): self
    {
        $this->origine = $origine;

        return $this;
    }

    public function getFamille(): ?string
    {
        return $this->famille;
    }

    public function setFamille(string $famille): self
    {
        $this->famille = $famille;

        return $this;
    }

    public function getPh(): ?string
    {
        return $this->ph;
    }

    public function setPh(string $ph): self
    {
        $this->ph = $ph;

        return $this;
    }

    public function getTemperature(): ?string
    {
        return $this->temperature;
    }

    public function setTemperature(string $temperature): self
    {
        $this->temperature = $temperature;

        return $this;
    }

    public function getTaille(): ?string
    {
        return $this->taille;
    }

    public function setTaille(string $taille): self
    {
        $this->taille = $taille;

        return $this;
    }

    public function __toString()//pour l'objet passe en string(methode magique)
    {
        return $this->nom;
    }
    
}
