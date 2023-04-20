<?php

namespace App\Entity;

use App\Repository\ElecteurRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ElecteurRepository::class)]
class Electeur extends Utilisateur
{
    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Candidature $Candidature = null;

    public function getCandidature(): ?Candidature
    {
        return $this->Candidature;
    }

    public function setCandidature(?Candidature $Candidature): self
    {
        $this->Candidature = $Candidature;

        return $this;
    }
}
