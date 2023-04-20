<?php

namespace App\Entity;

use App\Repository\OrganisateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrganisateurRepository::class)]
class Organisateur extends Utilisateur
{
    #[ORM\OneToMany(mappedBy: 'Organisateurs', targetEntity: Election::class)]
    private Collection $electionss;

    #[ORM\OneToMany(mappedBy: 'Organisateur', targetEntity: Candidature::class)]
    private Collection $candidatures;

    public function __construct()
    {
        $this->electionss = new ArrayCollection();
        $this->candidatures = new ArrayCollection();
    }

    /**
     * @return Collection<int, Election>
     */
    public function getElections(): Collection
    {
        return $this->electionss;
    }

    public function addElections(Election $electionss): self
    {
        if (!$this->electionss->contains($electionss)) {
            $this->electionss->add($electionss);
            $electionss->setOrganisateurs($this);
        }

        return $this;
    }

    public function removeElections(Election $electionss): self
    {
        if ($this->electionss->removeElement($electionss)) {
            // set the owning side to null (unless already changed)
            if ($electionss->getOrganisateurs() === $this) {
                $electionss->setOrganisateurs(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Candidature>
     */
    public function getCandidatures(): Collection
    {
        return $this->candidatures;
    }

    public function addCandidature(Candidature $candidature): self
    {
        if (!$this->candidatures->contains($candidature)) {
            $this->candidatures->add($candidature);
            $candidature->setOrganisateur($this);
        }

        return $this;
    }

    public function removeCandidature(Candidature $candidature): self
    {
        if ($this->candidatures->removeElement($candidature)) {
            // set the owning side to null (unless already changed)
            if ($candidature->getOrganisateur() === $this) {
                $candidature->setOrganisateur(null);
            }
        }

        return $this;
    }
}
