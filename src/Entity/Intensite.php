<?php

namespace App\Entity;

use App\Repository\IntensiteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IntensiteRepository::class)]
class Intensite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $intensity = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIntensity(): ?string
    {
        return $this->intensity;
    }

    public function setIntensity(string $intensity): static
    {
        $this->intensity = $intensity;

        return $this;
    }
}
