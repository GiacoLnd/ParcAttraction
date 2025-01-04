<?php

namespace App\Entity;

use App\Repository\AttractionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AttractionRepository::class)]
class Attraction
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $capacite = null;

    #[ORM\Column]
    private ?int $duree = null;

    /**
     * @var Collection<int, Employe>
     */
    #[ORM\ManyToMany(targetEntity: Employe::class, mappedBy: 'attractions')]
    private Collection $employes;

    #[ORM\ManyToOne(inversedBy: 'attractions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?CategorieAttraction $categorieAttraction = null;

    /**
     * @var Collection<int, Reservation>
     */
    #[ORM\ManyToMany(targetEntity: Reservation::class, mappedBy: 'attractions')]
    private Collection $reservations;

    public function __construct()
    {
        $this->employes = new ArrayCollection();
        $this->reservations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getCapacite(): ?int
    {
        return $this->capacite;
    }

    public function setCapacite(int $capacite): static
    {
        $this->capacite = $capacite;

        return $this;
    }

    public function getDuree(): ?int
    {
        return $this->duree;
    }

    public function setDuree(int $duree): static
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * @return Collection<int, Employe>
     */
    public function getEmployes(): Collection
    {
        return $this->employes;
    }

    public function addEmploye(Employe $employe): static
    {
        if (!$this->employes->contains($employe)) {
            $this->employes->add($employe);
            $employe->addAttraction($this);
        }

        return $this;
    }

    public function removeEmploye(Employe $employe): static
    {
        if ($this->employes->removeElement($employe)) {
            $employe->removeAttraction($this);
        }

        return $this;
    }

    public function getCategorieAttraction(): ?CategorieAttraction
    {
        return $this->categorieAttraction;
    }

    public function setCategorieAttraction(?CategorieAttraction $categorieAttraction): static
    {
        $this->categorieAttraction = $categorieAttraction;

        return $this;
    }

    /**
     * @return Collection<int, Reservation>
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(Reservation $reservation): static
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations->add($reservation);
            $reservation->addAttraction($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): static
    {
        if ($this->reservations->removeElement($reservation)) {
            $reservation->removeAttraction($this);
        }

        return $this;
    }
}
