<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ClothesRepository")
 */
class Clothes
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Name;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Price;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Brand;

    /**
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $Year;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Link;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $Novelty;

    /**
     * @ORM\Column(type="datetime")
     */
    private $UpdateTime;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="clothes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Category;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Picture;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->Price;
    }

    public function setPrice(?int $Price): self
    {
        $this->Price = $Price;

        return $this;
    }

    public function getBrand(): ?string
    {
        return $this->Brand;
    }

    public function setBrand(string $Brand): self
    {
        $this->Brand = $Brand;

        return $this;
    }

    public function getYear(): ?\DateTimeInterface
    {
        return $this->Year;
    }

    public function setYear(?\DateTimeInterface $Year): self
    {
        $this->Year = $Year;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->Link;
    }

    public function setLink(?string $Link): self
    {
        $this->Link = $Link;

        return $this;
    }
    
    public function getNovelty(): ?bool
    {
        return $this->Novelty;
    }

    public function setNovelty(?bool $Novelty): self
    {
        $this->Novelty = $Novelty;

        return $this;
    }

    public function getUpdateTime(): ?\DateTimeInterface
    {
        return $this->UpdateTime;
    }

    public function setUpdateTime(\DateTimeInterface $UpdateTime): self
    {
        $this->UpdateTime = $UpdateTime;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->Category;
    }

    public function setCategory(?Category $Category): self
    {
        $this->Category = $Category;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->Picture;
    }

    public function setPicture(string $Picture): self
    {
        $this->Picture = $Picture;

        return $this;
    }
}
