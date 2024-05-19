<?php

namespace App\Entity;

use App\Repository\MaintenanceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MaintenanceRepository::class)]
class Maintenance
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $switch = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isSwitch(): ?bool
    {
        return $this->switch;
    }

    public function setSwitch(bool $switch): static
    {
        $this->switch = $switch;

        return $this;
    }
}
