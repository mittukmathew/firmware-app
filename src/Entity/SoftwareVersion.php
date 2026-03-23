<?php

namespace App\Entity;

use App\Repository\SoftwareVersionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SoftwareVersionRepository::class)]
class SoftwareVersion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $systemVersionAlt = null;

    #[ORM\Column]
    private ?bool $isLatest = null;

    #[ORM\Column]
    private ?bool $isLci = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lciType = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $stLink = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $gdLink = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $mainLink = null;

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

    public function getSystemVersionAlt(): ?string
    {
        return $this->systemVersionAlt;
    }

    public function setSystemVersionAlt(string $systemVersionAlt): static
    {
        $this->systemVersionAlt = $systemVersionAlt;

        return $this;
    }

    public function isIsLatest(): ?bool
    {
        return $this->isLatest;
    }

    public function setIsLatest(bool $isLatest): static
    {
        $this->isLatest = $isLatest;

        return $this;
    }

    public function isIsLci(): ?bool
    {
        return $this->isLci;
    }

    public function setIsLci(bool $isLci): static
    {
        $this->isLci = $isLci;

        return $this;
    }

    public function getLciType(): ?string
    {
        return $this->lciType;
    }

    public function setLciType(?string $lciType): static
    {
        $this->lciType = $lciType;

        return $this;
    }

    public function getStLink(): ?string
    {
        return $this->stLink;
    }

    public function setStLink(?string $stLink): static
    {
        $this->stLink = $stLink;

        return $this;
    }

    public function getGdLink(): ?string
    {
        return $this->gdLink;
    }

    public function setGdLink(?string $gdLink): static
    {
        $this->gdLink = $gdLink;

        return $this;
    }

    public function getMainLink(): ?string
    {
        return $this->mainLink;
    }

    public function setMainLink(?string $mainLink): static
    {
        $this->mainLink = $mainLink;

        return $this;
    }
}
