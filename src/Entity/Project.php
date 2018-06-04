<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProjectRepository")
 */
class Project
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $title;

    /**
     * @ORM\Column(type="datetime")
     */
    private $devDate;

    /**
     * @ORM\Column(type="text")
     */
    private $technologyUsed;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $state;

    /**
     * @ORM\Column(type="text")
     */
    private $body;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ImageProject", mappedBy="project")
     */
    private $images;

    public function __construct()
    {
        $this->images = new ArrayCollection();
    }

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

    public function getDevDate(): ?\DateTimeInterface
    {
        return $this->devDate;
    }

    public function setDevDate(\DateTimeInterface $devDate): self
    {
        $this->devDate = $devDate;

        return $this;
    }

    public function getTechnologyUsed(): ?string
    {
        return $this->technologyUsed;
    }

    public function setTechnologyUsed(string $technologyUsed): self
    {
        $this->technologyUsed = $technologyUsed;

        return $this;
    }

    public function getString(): ?string
    {
        return $this->string;
    }

    public function setString(?string $string): self
    {
        $this->string = $string;

        return $this;
    }

    public function getBody(): ?string
    {
        return $this->body;
    }

    public function setBody(string $body): self
    {
        $this->body = $body;

        return $this;
    }

    /**
     * @return Collection|ImageProject[]
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(ImageProject $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setProject($this);
        }

        return $this;
    }

    public function removeImage(ImageProject $image): self
    {
        if ($this->images->contains($image)) {
            $this->images->removeElement($image);
            // set the owning side to null (unless already changed)
            if ($image->getProject() === $this) {
                $image->setProject(null);
            }
        }

        return $this;
    }
}
