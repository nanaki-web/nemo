<?php

namespace App\Entity;

use App\Repository\SsRubriqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;

#[ORM\Entity(repositoryClass: SsRubriqueRepository::class)]
class SsRubrique
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'RubriqueParent')]
    private ?self $rubriqueParent = null;

    #[ORM\OneToMany(mappedBy: 'rubriqueParent', targetEntity: self::class)]
    private Collection $RubriqueParent;

    #[ORM\OneToMany(mappedBy: 'rubrique', targetEntity: Produit::class)]
    private Collection $produits;

    #[ORM\Column(length: 255)]
    private ?string $photo = null;




    public function __construct()
    {
        
        $this->ssRubriques = new ArrayCollection();
        $this->produits = new ArrayCollection();
        $this->RubriqueParent = new ArrayCollection();
        
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

    public function getSsRubrique(): ?self
    {
        return $this->ssRubrique;/////////////////////////////////////////////////////
    }

    public function setSsRubrique(?self $ssRubrique): self
    {
        $this->ssRubrique = $ssRubrique;/////////////////////////////////////////////////////

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function __toString()
    {
        return $this->nom;
    }

    public function getRubriqueParent(): ?self
    {
        return $this->rubriqueParent;
    }

    public function setRubriqueParent(?self $rubriqueParent): self
    {
        $this->rubriqueParent = $rubriqueParent;

        return $this;
    }

    public function addRubriqueParent(self $rubriqueParent): self
    {
        if (!$this->RubriqueParent->contains($rubriqueParent)) {
            $this->RubriqueParent->add($rubriqueParent);
            $rubriqueParent->setRubriqueParent($this);
        }

        return $this;
    }

    public function removeRubriqueParent(self $rubriqueParent): self
    {
        if ($this->RubriqueParent->removeElement($rubriqueParent)) {
            // set the owning side to null (unless already changed)
            if ($rubriqueParent->getRubriqueParent() === $this) {
                $rubriqueParent->setRubriqueParent(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Produit>
     */
    public function getProduits(): Collection
    {
        return $this->produits;
    }

    public function addProduit(Produit $produit): self
    {
        if (!$this->produits->contains($produit)) {
            $this->produits->add($produit);
            $produit->setRubrique($this);
        }

        return $this;
    }

    public function removeProduit(Produit $produit): self
    {
        if ($this->produits->removeElement($produit)) {
            // set the owning side to null (unless already changed)
            if ($produit->getRubrique() === $this) {
                $produit->setRubrique(null);
            }
        }

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    

    
    

    

    
  

    

  
}
