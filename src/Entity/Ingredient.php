<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\IngredientRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IngredientRepository::class)]
#[ApiResource]
class Ingredient
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $calories_per_100_g = null;

    #[ORM\Column]
    private ?int $proteins_per_100_g = null;

    #[ORM\Column]
    private ?int $fats_per_100_g = null;

    #[ORM\Column]
    private ?int $carbs_per_100_g = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getCaloriesPer100G(): ?int
    {
        return $this->calories_per_100_g;
    }

    public function setCaloriesPer100G(int $calories_per_100_g): static
    {
        $this->calories_per_100_g = $calories_per_100_g;

        return $this;
    }

    public function getProteinsPer100G(): ?int
    {
        return $this->proteins_per_100_g;
    }

    public function setProteinsPer100G(int $proteins_per_100_g): static
    {
        $this->proteins_per_100_g = $proteins_per_100_g;

        return $this;
    }

    public function getFatsPer100G(): ?int
    {
        return $this->fats_per_100_g;
    }

    public function setFatsPer100G(int $fats_per_100_g): static
    {
        $this->fats_per_100_g = $fats_per_100_g;

        return $this;
    }

    public function getCarbsPer100G(): ?int
    {
        return $this->carbs_per_100_g;
    }

    public function setCarbsPer100G(int $carbs_per_100_g): static
    {
        $this->carbs_per_100_g = $carbs_per_100_g;

        return $this;
    }

    public function getUserId(): ?User
    {
        return $this->user_id;
    }

    public function setUserId(?User $user_id): static
    {
        $this->user_id = $user_id;

        return $this;
    }
}
