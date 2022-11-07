<?php

namespace App\Entity;

use App\Repository\TransporteursRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TransporteursRepository::class)]
class Transporteurs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomTransport = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column]
    private ?float $prixTransport = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $creerAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomTransport(): ?string
    {
        return $this->nomTransport;
    }

    public function setNomTransport(string $nomTransport): self
    {
        $this->nomTransport = $nomTransport;

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

    public function getPrixTransport(): ?float
    {
        return $this->prixTransport;
    }

    public function setPrixTransport(float $prixTransport): self
    {
        $this->prixTransport = $prixTransport;

        return $this;
    }

    public function getCreerAt(): ?\DateTimeInterface
    {
        return $this->creerAt;
    }

    public function setCreerAt(\DateTimeInterface $creerAt): self
    {
        $this->creerAt = $creerAt;

        return $this;
    }
}
