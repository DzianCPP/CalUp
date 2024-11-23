<?php

namespace App\Entity;

use App\Repository\MealPortionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MealPortionRepository::class)]
class MealPortion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Meal $meal_id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Portion $portion_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMealId(): ?Meal
    {
        return $this->meal_id;
    }

    public function setMealId(?Meal $meal_id): static
    {
        $this->meal_id = $meal_id;

        return $this;
    }

    public function getPortionId(): ?Portion
    {
        return $this->portion_id;
    }

    public function setPortionId(Portion $portion_id): static
    {
        $this->portion_id = $portion_id;

        return $this;
    }
}
