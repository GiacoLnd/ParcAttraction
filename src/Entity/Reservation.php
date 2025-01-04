<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateBooking = null;

    #[ORM\Column(length: 50)]
    private ?string $statut = null;

    #[ORM\Column]
    private ?int $nombrePersonne = null;

    #[ORM\ManyToOne(inversedBy: 'reservations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Visiteur $visiteur = null;

    /**
     * @var Collection<int, Forfait>
     */
    #[ORM\ManyToMany(targetEntity: Forfait::class, inversedBy: 'reservations')]
    private Collection $Forfaits;

    /**
     * @var Collection<int, Experience>
     */
    #[ORM\ManyToMany(targetEntity: Experience::class, inversedBy: 'reservations')]
    private Collection $experiences;

    /**
     * @var Collection<int, Attraction>
     */
    #[ORM\ManyToMany(targetEntity: Attraction::class, inversedBy: 'reservations')]
    private Collection $attractions;

    public function __construct()
    {
        $this->Forfaits = new ArrayCollection();
        $this->experiences = new ArrayCollection();
        $this->attractions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateBooking(): ?\DateTimeInterface
    {
        return $this->dateBooking;
    }

    public function setDateBooking(\DateTimeInterface $dateBooking): static
    {
        $this->dateBooking = $dateBooking;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): static
    {
        $this->statut = $statut;

        return $this;
    }

    public function getNombrePersonne(): ?int
    {
        return $this->nombrePersonne;
    }

    public function setNombrePersonne(int $nombrePersonne): static
    {
        $this->nombrePersonne = $nombrePersonne;

        return $this;
    }

    public function getVisiteur(): ?Visiteur
    {
        return $this->visiteur;
    }

    public function setVisiteur(?Visiteur $visiteur): static
    {
        $this->visiteur = $visiteur;

        return $this;
    }

    /**
     * @return Collection<int, Forfait>
     */
    public function getForfaits(): Collection
    {
        return $this->Forfaits;
    }

    public function addForfait(Forfait $forfait): static
    {
        if (!$this->Forfaits->contains($forfait)) {
            $this->Forfaits->add($forfait);
        }

        return $this;
    }

    public function removeForfait(Forfait $forfait): static
    {
        $this->Forfaits->removeElement($forfait);

        return $this;
    }

    /**
     * @return Collection<int, Experience>
     */
    public function getExperiences(): Collection
    {
        return $this->experiences;
    }

    public function addExperience(Experience $experience): static
    {
        if (!$this->experiences->contains($experience)) {
            $this->experiences->add($experience);
        }

        return $this;
    }

    public function removeExperience(Experience $experience): static
    {
        $this->experiences->removeElement($experience);

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
