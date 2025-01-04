<?php

namespace App\Entity;

use App\Repository\CategorieAttractionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorieAttractionRepository::class)]
class CategorieAttraction
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $categoryName = null;

    /**
     * @var Collection<int, Attraction>
     */
    #[ORM\OneToMany(targetEntity: Attraction::class, mappedBy: 'categorieAttraction', orphanRemoval: true)]
    private Collection $attractions;

    public function __construct()
    {
        $this->attractions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategoryName(): ?string
    {
        return $this->categoryName;
    }

    public function setCategoryName(string $categoryName): static
    {
        $this->categoryName = $categoryName;

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
            $attraction->setCategorieAttraction($this);
        }

        return $this;
    }

    public function removeAttraction(Attraction $attraction): static
    {
        if ($this->attractions->removeElement($attraction)) {
            // set the owning side to null (unless already changed)
            if ($attraction->getCategorieAttraction() === $this) {
                $attraction->setCategorieAttraction(null);
            }
        }

        return $this;
    }
}
