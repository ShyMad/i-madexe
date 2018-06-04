<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FromationRepository")
 */
class Fromation
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
    private $title;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $country;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $city;

    /**
     * @ORM\Column(type="smallint")
     */
    private $yearOfStart;

    /**
     * @ORM\Column(type="smallint")
     */
    private $yearOfEnd;

    public function getId()
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getYearOfStart(): ?int
    {
        return $this->yearOfStart;
    }

    public function setYearOfStart(int $yearOfStart): self
    {
        $this->yearOfStart = $yearOfStart;

        return $this;
    }

    public function getYearOfEnd(): ?int
    {
        return $this->yearOfEnd;
    }

    public function setYearOfEnd(int $yearOfEnd): self
    {
        $this->yearOfEnd = $yearOfEnd;

        return $this;
    }
}
