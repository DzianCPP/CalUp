<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\DayRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DayRepository::class)]
#[ApiResource]
class Day
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user_id = null;

    #[ORM\Column]
    private ?int $calories_limit = null;

    #[ORM\Column]
    private ?int $proteins_limit = null;

    #[ORM\Column]
    private ?int $fats_limit = null;

    #[ORM\Column]
    private ?int $carbs_limit = null;

    #[ORM\Column]
    private ?float $current_weight = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

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

    public function getCaloriesLimit(): ?int
    {
        return $this->calories_limit;
    }

    public function setCaloriesLimit(int $calories_limit): static
    {
        $this->calories_limit = $calories_limit;

        return $this;
    }

    public function getProteinsLimit(): ?int
    {
        return $this->proteins_limit;
    }

    public function setProteinsLimit(int $proteins_limit): static
    {
        $this->proteins_limit = $proteins_limit;

        return $this;
    }

    public function getFatsLimit(): ?int
    {
        return $this->fats_limit;
    }

    public function setFatsLimit(int $fats_limit): static
    {
        $this->fats_limit = $fats_limit;

        return $this;
    }

    public function getCarbsLimit(): ?int
    {
        return $this->carbs_limit;
    }

    public function setCarbsLimit(int $carbs_limit): static
    {
        $this->carbs_limit = $carbs_limit;

        return $this;
    }

    public function getCurrentWeight(): ?float
    {
        return $this->current_weight;
    }

    public function setCurrentWeight(float $current_weight): static
    {
        $this->current_weight = $current_weight;

        return $this;
    }
}
