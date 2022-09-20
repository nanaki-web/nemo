<?php

namespace App\Entity;

use App\Repository\SsRubriqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SsRubriqueRepository::class)]
class SsRubrique
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nom = null;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'rubrique')]
    private ?self $ssRubrique = null; /////////////////////////////////////////////////////

    #[ORM\OneToMany(mappedBy: 'ssRubrique', targetEntity: self::class)]
    private Collection $rubrique;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'ssRubriques')]
    private ?self $parent = null;

    #[ORM\OneToMany(mappedBy: 'parent', targetEntity: self::class)]
    private Collection $ssRubriques;

    public function __construct()
    {
        $this->rubrique = new ArrayCollection();
        $this->ssRubriques = new ArrayCollection();
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

    /**
     * @return Collection<int, self>
     */
    public function getRubrique(): Collection
    {
        return $this->rubrique;
    }

    public function addRubrique(self $rubrique): self
    {
        if (!$this->rubrique->contains($rubrique)) {
            $this->rubrique->add($rubrique);
            $rubrique->setSsRubrique($this);/////////////////////////////////////////////////////
        }

        return $this;
    }

    public function removeRubrique(self $rubrique): self
    {
        if ($this->rubrique->removeElement($rubrique)) {
            // set the owning side to null (unless already changed)
            if ($rubrique->getSsRubrique() === $this) {
                $rubrique->setSsRubrique(null);/////////////////////////////////////////////////////
            }
        }

        return $this;
    }

    public function getParent(): ?self
    {
        return $this->parent;
    }

    public function setParent(?self $parent): self
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getSsRubriques(): Collection
    {
        return $this->ssRubriques;
    }

    public function addSsRubrique(self $ssRubrique): self
    {
        if (!$this->ssRubriques->contains($ssRubrique)) {
            $this->ssRubriques->add($ssRubrique);
            $ssRubrique->setParent($this);
        }

        return $this;
    }

    public function removeSsRubrique(self $ssRubrique): self
    {
        if ($this->ssRubriques->removeElement($ssRubrique)) {
            // set the owning side to null (unless already changed)
            if ($ssRubrique->getParent() === $this) {
                $ssRubrique->setParent(null);
            }
        }

        return $this;
    }
}
