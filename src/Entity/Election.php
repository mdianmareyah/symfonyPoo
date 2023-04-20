<?php

namespace App\Entity;

use App\Repository\ElectionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ElectionRepository::class)]
class Election
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $dateDebut = null;

    #[ORM\Column(length: 255)]
    private ?string $dateFin = null;

    #[ORM\Column]
    private ?bool $etat = null;

    #[ORM\ManyToOne(inversedBy: 'elections')]
    private ?Organisateur $Organisateurs = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDebut(): ?string
    {
        return $this->dateDebut;
    }

    public function setDateDebut(string $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?string
    {
        return $this->dateFin;
    }

    public function setDateFin(string $dateFin): self
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    public function isEtat(): ?bool
    {
        return $this->etat;
    }

    public function setEtat(bool $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getOrganisateurs(): ?Organisateur
    {
        return $this->Organisateurs;
    }

    public function setOrganisateurs(?Organisateur $Organisateurs): self
    {
        $this->Organisateurs = $Organisateurs;

        return $this;
    }

    public function ouvrirElection(): self
    {
        return $this;
    }

    public function clotureElection(): self
    {
        return $this;
    }
}
