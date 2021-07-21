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
}
