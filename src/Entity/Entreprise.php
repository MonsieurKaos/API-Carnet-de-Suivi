<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entreprise
 *
 * @ORM\Table(name="entreprise")
 * @ORM\Entity
 */
class Entreprise
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int|null
     *
     * @ORM\Column(name="eleve_id", type="integer", nullable=true)
     */
    private $eleveId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Semaine", type="string", length=99, nullable=true)
     */
    private $semaine;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Acti_prev", type="text", length=65535, nullable=true)
     */
    private $actiPrev;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Acti_rea", type="text", length=65535, nullable=true)
     */
    private $actiRea;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Commentaire", type="text", length=65535, nullable=true)
     */
    private $commentaire;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Compe_mise_en_eouvre", type="text", length=65535, nullable=true)
     */
    private $compeMiseEnEouvre;

    private Eleve $eleve;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getEleveId()
    {
        return $this->eleveId;
    }

    /**
     * @param mixed $eleveId
     */
    public function setEleveId($eleveId): void
    {
        $this->eleveId = $eleveId;
    }

    /**
     * @return string|null
     */
    public function getSemaine(): ?string
    {
        return $this->semaine;
    }

    /**
     * @param string|null $semaine
     */
    public function setSemaine(?string $semaine): void
    {
        $this->semaine = $semaine;
    }

    /**
     * @return string|null
     */
    public function getActiPrev(): ?string
    {
        return $this->actiPrev;
    }

    /**
     * @param string|null $actiPrev
     */
    public function setActiPrev(?string $actiPrev): void
    {
        $this->actiPrev = $actiPrev;
    }

    /**
     * @return string|null
     */
    public function getActiRea(): ?string
    {
        return $this->actiRea;
    }

    /**
     * @param string|null $actiRea
     */
    public function setActiRea(?string $actiRea): void
    {
        $this->actiRea = $actiRea;
    }

    /**
     * @return string|null
     */
    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    /**
     * @param string|null $commentaire
     */
    public function setCommentaire(?string $commentaire): void
    {
        $this->commentaire = $commentaire;
    }

    /**
     * @return string|null
     */
    public function getCompeMiseEnEouvre(): ?string
    {
        return $this->compeMiseEnEouvre;
    }

    /**
     * @param string|null $compeMiseEnEouvre
     */
    public function setCompeMiseEnEouvre(?string $compeMiseEnEouvre): void
    {
        $this->compeMiseEnEouvre = $compeMiseEnEouvre;
    }

    /**
     * @return Eleve
     */
    public function getEleve(): Eleve
    {
        return $this->eleve;
    }

    /**
     * @param Eleve $eleve
     */
    public function setEleve(Eleve $eleve): void
    {
        $this->eleve = $eleve;
    }


}
