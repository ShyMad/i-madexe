<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SkillRepository")
 */
class Skill
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $title;

    /**
     * @ORM\Column(type="smallint")
     */
    private $lvl;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $typeOfSkill;

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

    public function getLvl(): ?int
    {
        return $this->lvl;
    }

    public function setLvl(int $lvl): self
    {
        $this->lvl = $lvl;

        return $this;
    }

    public function getTypeOfSkill(): ?string
    {
        return $this->typeOfSkill;
    }

    public function setTypeOfSkill(?string $typeOfSkill): self
    {
        $this->typeOfSkill = $typeOfSkill;

        return $this;
    }
}
