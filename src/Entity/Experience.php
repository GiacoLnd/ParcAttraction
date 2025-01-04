<?php

namespace App\Entity;

use App\Repository\ExperienceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExperienceRepository::class)]
class Experience
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nomExperience = null;

    #[ORM\Column]
    private ?float $prixExperience = null;

    #[ORM\Column]
    private ?int $dureeExperience = null;

    /**
     * @var Collection<int, Reservation>
     */
    #[ORM\ManyToMany(targetEntity: Reservation::class, mappedBy: 'experiences')]
    private Collection $reservations;

    public function __construct()
    {
        $this->reservations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomExperience(): ?string
    {
        return $this->nomExperience;
    }

    public function setNomExperience(string $nomExperience): static
    {
        $this->nomExperience = $nomExperience;

        return $this;
    }

    public function getPrixExperience(): ?float
    {
        return $this->prixExperience;
    }

    public function setPrixExperience(float $prixExperience): static
    {
        $this->prixExperience = $prixExperience;

        return $this;
    }

    public function getDureeExperience(): ?int
    {
        return $this->dureeExperience;
    }

    public function setDureeExperience(int $dureeExperience): static
    {
        $this->dureeExperience = $dureeExperience;

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
            $reservation->addExperience($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): static
    {
        if ($this->reservations->removeElement($reservation)) {
            $reservation->removeExperience($this);
        }

        return $this;
    }
}
