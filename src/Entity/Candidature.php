<?php

namespace App\Entity;

use App\Repository\CandidatureRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CandidatureRepository::class)]
class Candidature
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $dateCandidature = null;

    #[ORM\Column(nullable: true)]
    private ?bool $etatCandidature = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Electeur $Electeur = null;

    #[ORM\ManyToOne(inversedBy: 'candidatures')]
    private ?Organisateur $Organisateur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateCandidature(): ?string
    {
        return $this->dateCandidature;
    }

    public function setDateCandidature(string $dateCandidature): self
    {
        $this->dateCandidature = $dateCandidature;

        return $this;
    }

    public function isEtatCandidature(): ?bool
    {
        return $this->etatCandidature;
    }

    public function setEtatCandidature(?bool $etatCandidature): self
    {
        $this->etatCandidature = $etatCandidature;

        return $this;
    }

    public function getElecteur(): ?Electeur
    {
        return $this->Electeur;
    }

    public function setElecteur(?Electeur $Electeur): self
    {
        $this->Electeur = $Electeur;

        return $this;
    }

    public function getOrganisateur(): ?Organisateur
    {
        return $this->Organisateur;
    }

    public function setOrganisateur(?Organisateur $Organisateur): self
    {
        $this->Organisateur = $Organisateur;

        return $this;
    }

    public function validerCandidature(): self 
    {
        return $this;
    }

    public function RejeterCanditature(): self
    {
        return $this;
    }
}
