<?php

namespace App\Entity;

use App\Repository\EmployeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmployeRepository::class)]
class Employe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $prenom = null;

    #[ORM\Column(length: 100)]
    private ?string $nom = null;

    #[ORM\Column(length: 100)]
    private ?string $role = null;

    /**
     * @var Collection<int, Attraction>
     */
    #[ORM\ManyToMany(targetEntity: Attraction::class, inversedBy: 'employes')]
    private Collection $attractions;

    public function __construct()
    {
        $this->attractions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): static
    {
        $this->role = $role;

        return $this;
    }

    /**
     * @return Collection<int, Attraction>
     */
    public function getAttractions(): Collection
    {
        return $this->attractions;
    }

    public function addAttraction(Attraction $attraction): static
    {
        if (!$this->attractions->contains($attraction)) {
            $this->attractions->add($attraction);
        }

        return $this;
    }

    public function removeAttraction(Attraction $attraction): static
    {
        $this->attractions->removeElement($attraction);

        return $this;
    }
}
