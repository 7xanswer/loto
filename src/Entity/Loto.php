<?php

namespace App\Entity;

use App\Repository\LotoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LotoRepository::class)
 */
class Loto
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
    private $annee_numero_de_tirage;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $jour_de_tirage;

    /**
     * @ORM\Column(type="date")
     */
    private $date_de_tirage;

    /**
     * @ORM\Column(type="date")
     */
    private $date_de_forclusion;

    /**
     * @ORM\Column(type="integer")
     */
    private $boule_1;

    /**
     * @ORM\Column(type="integer")
     */
    private $boule_2;

    /**
     * @ORM\Column(type="integer")
     */
    private $boule_3;

    /**
     * @ORM\Column(type="integer")
     */
    private $boule_4;

    /**
     * @ORM\Column(type="integer")
     */
    private $boule_5;

    /**
     * @ORM\Column(type="integer")
     */
    private $numero_chance;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnneeNumeroDeTirage(): ?string
    {
        return $this->annee_numero_de_tirage;
    }

    public function setAnneeNumeroDeTirage(string $annee_numero_de_tirage): self
    {
        $this->annee_numero_de_tirage = $annee_numero_de_tirage;

        return $this;
    }

    public function getJourDeTirage(): ?string
    {
        return $this->jour_de_tirage;
    }

    public function setJourDeTirage(string $jour_de_tirage): self
    {
        $this->jour_de_tirage = $jour_de_tirage;

        return $this;
    }

    public function getDateDeTirage(): ?\DateTimeInterface
    {
        return $this->date_de_tirage;
    }

    public function setDateDeTirage(\DateTimeInterface $date_de_tirage): self
    {
        $this->date_de_tirage = $date_de_tirage;

        return $this;
    }

    public function getDateDeForclusion(): ?\DateTimeInterface
    {
        return $this->date_de_forclusion;
    }

    public function setDateDeForclusion(\DateTimeInterface $date_de_forclusion): self
    {
        $this->date_de_forclusion = $date_de_forclusion;

        return $this;
    }

    public function getBoule1(): ?int
    {
        return $this->boule_1;
    }

    public function setBoule1(int $boule_1): self
    {
        $this->boule_1 = $boule_1;

        return $this;
    }

    public function getBoule2(): ?int
    {
        return $this->boule_2;
    }

    public function setBoule2(int $boule_2): self
    {
        $this->boule_2 = $boule_2;

        return $this;
    }

    public function getBoule3(): ?int
    {
        return $this->boule_3;
    }

    public function setBoule3(int $boule_3): self
    {
        $this->boule_3 = $boule_3;

        return $this;
    }

    public function getBoule4(): ?int
    {
        return $this->boule_4;
    }

    public function setBoule4(int $boule_4): self
    {
        $this->boule_4 = $boule_4;

        return $this;
    }

    public function getBoule5(): ?int
    {
        return $this->boule_5;
    }

    public function setBoule5(int $boule_5): self
    {
        $this->boule_5 = $boule_5;

        return $this;
    }

    public function getNumeroChance(): ?int
    {
        return $this->numero_chance;
    }

    public function setNumeroChance(int $numero_chance): self
    {
        $this->numero_chance = $numero_chance;

        return $this;
    }
}
