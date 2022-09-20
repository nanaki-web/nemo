<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandeRepository::class)]
class Commande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $reglement = null;

    #[ORM\Column(length: 50)]
    private ?string $numero = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $totalHt = null;

    #[ORM\Column]
    private ?int $tva = null;

    #[ORM\Column]
    private ?int $reduction = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $total = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $totalTtc = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(length: 50)]
    private ?string $adresse_livraison = null;

    #[ORM\Column(length: 50)]
    private ?string $codePostal_facturation = null;

    #[ORM\Column(length: 50)]
    private ?string $ville_facturation = null;

    #[ORM\Column(length: 5)]
    private ?string $codePostal_livraison = null;

    #[ORM\Column(length: 50)]
    private ?string $ville_livraison = null;

    #[ORM\Column(length: 50)]
    private ?string $facture_numero = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $facture_date = null;

    #[ORM\Column(length: 50)]
    private ?string $quantite_pro = null;

    #[ORM\ManyToMany(targetEntity: Produit::class, inversedBy: 'commandes')]
    private Collection $produit;

    #[ORM\ManyToOne]
    private ?Livraison $livraison = null;

    #[ORM\ManyToOne(inversedBy: 'commandes')]
    private ?Client $client = null;

    public function __construct()
    {
        $this->produit = new ArrayCollection();
        $this->client = new ArrayCollection();
        $this->commercial = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReglement(): ?string
    {
        return $this->reglement;
    }

    public function setReglement(string $reglement): self
    {
        $this->reglement = $reglement;

        return $this;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getTotalHt(): ?string
    {
        return $this->totalHt;
    }

    public function setTotalHt(string $totalHt): self
    {
        $this->totalHt = $totalHt;

        return $this;
    }

    public function getTva(): ?int
    {
        return $this->tva;
    }

    public function setTva(int $tva): self
    {
        $this->tva = $tva;

        return $this;
    }

    public function getReduction(): ?int
    {
        return $this->reduction;
    }

    public function setReduction(int $reduction): self
    {
        $this->reduction = $reduction;

        return $this;
    }

    public function getTotal(): ?string
    {
        return $this->total;
    }

    public function setTotal(string $total): self
    {
        $this->total = $total;

        return $this;
    }

    public function getTotalTtc(): ?string
    {
        return $this->totalTtc;
    }

    public function setTotalTtc(string $totalTtc): self
    {
        $this->totalTtc = $totalTtc;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getAdresseLivraison(): ?string
    {
        return $this->adresse_livraison;
    }

    public function setAdresseLivraison(string $adresse_livraison): self
    {
        $this->adresse_livraison = $adresse_livraison;

        return $this;
    }

    public function getCodePostalFacturation(): ?string
    {
        return $this->codePostal_facturation;
    }

    public function setCodePostalFacturation(string $codePostal_facturation): self
    {
        $this->codePostal_facturation = $codePostal_facturation;

        return $this;
    }

    public function getVilleFacturation(): ?string
    {
        return $this->ville_facturation;
    }

    public function setVilleFacturation(string $ville_facturation): self
    {
        $this->ville_facturation = $ville_facturation;

        return $this;
    }

    public function getCodePostalLivraison(): ?string
    {
        return $this->codePostal_livraison;
    }

    public function setCodePostalLivraison(string $codePostal_livraison): self
    {
        $this->codePostal_livraison = $codePostal_livraison;

        return $this;
    }

    public function getVilleLivraison(): ?string
    {
        return $this->ville_livraison;
    }

    public function setVilleLivraison(string $ville_livraison): self
    {
        $this->ville_livraison = $ville_livraison;

        return $this;
    }

    public function getFactureNumero(): ?string
    {
        return $this->facture_numero;
    }

    public function setFactureNumero(string $facture_numero): self
    {
        $this->facture_numero = $facture_numero;

        return $this;
    }

    public function getFactureDate(): ?\DateTimeInterface
    {
        return $this->facture_date;
    }

    public function setFactureDate(?\DateTimeInterface $facture_date): self
    {
        $this->facture_date = $facture_date;

        return $this;
    }

    public function getQuantitePro(): ?string
    {
        return $this->quantite_pro;
    }

    public function setQuantitePro(string $quantite_pro): self
    {
        $this->quantite_pro = $quantite_pro;

        return $this;
    }

    /**
     * @return Collection<int, Produit>
     */
    public function getProduit(): Collection
    {
        return $this->produit;
    }

    public function addProduit(Produit $produit): self
    {
        if (!$this->produit->contains($produit)) {
            $this->produit->add($produit);
        }

        return $this;
    }

    public function removeProduit(Produit $produit): self
    {
        $this->produit->removeElement($produit);

        return $this;
    }

    public function getLivraison(): ?Livraison
    {
        return $this->livraison;
    }

    public function setLivraison(?Livraison $livraison): self
    {
        $this->livraison = $livraison;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    
}
