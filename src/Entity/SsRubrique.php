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

    public function __construct()
    {
        $this->rubrique = new ArrayCollection();
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
}
