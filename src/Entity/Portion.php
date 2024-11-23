<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\PortionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PortionRepository::class)]
#[ApiResource]
class Portion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $portion_mass_g = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Ingredient $ingredient_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPortionMassG(): ?int
    {
        return $this->portion_mass_g;
    }

    public function setPortionMassG(int $portion_mass_g): static
    {
        $this->portion_mass_g = $portion_mass_g;

        return $this;
    }

    public function getIngredientId(): ?Ingredient
    {
        return $this->ingredient_id;
    }

    public function setIngredientId(?Ingredient $ingredient_id): static
    {
        $this->ingredient_id = $ingredient_id;

        return $this;
    }
}
