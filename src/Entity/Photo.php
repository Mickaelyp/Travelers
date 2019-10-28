<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PhotoRepository")
 */
class Photo
{

    use BaseEntityTrait;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $legende;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $filepath;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateImage;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Voyage", inversedBy="photos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $voyage;


    public function getLegende(): ?string
    {
        return $this->legende;
    }

    public function setLegende(?string $legende): self
    {
        $this->legende = $legende;

        return $this;
    }

    public function getFilepath(): ?string
    {
        return $this->filepath;
    }

    public function setFilepath(string $filepath): self
    {
        $this->filepath = $filepath;

        return $this;
    }

    public function getDateImage(): ?\DateTimeInterface
    {
        return $this->dateImage;
    }

    public function setDateImage(?\DateTimeInterface $dateImage): self
    {
        $this->dateImage = $dateImage;

        return $this;
    }

    public function getVoyage(): ?Voyage
    {
        return $this->voyage;
    }

    public function setVoyage(?Voyage $voyage): self
    {
        $this->voyage = $voyage;

        return $this;
    }
}
