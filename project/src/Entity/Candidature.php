<?php

namespace App\Entity;

use App\Repository\CandidatureRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CandidatureRepository::class)
 */
class Candidature
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $condidat;

    /**
     * @ORM\Column(type="text")
     */
    private $continu;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity=Job::class, inversedBy="candidatures")
     */
    private $job;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCondidat(): ?string
    {
        return $this->condidat;
    }

    public function setCondidat(string $condidat): self
    {
        $this->condidat = $condidat;

        return $this;
    }

    public function getContinu(): ?string
    {
        return $this->continu;
    }

    public function setContinu(string $continu): self
    {
        $this->continu = $continu;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getJob(): ?Job
    {
        return $this->job;
    }

    public function setJob(?Job $job): self
    {
        $this->job = $job;

        return $this;
    }
}
