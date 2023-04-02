<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ecole1
 *
 * @ORM\Table(name="ecole1")
 * @ORM\Entity
 */
class Ecole1
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
     * @ORM\Column(name="eleve_id", type="integer", nullable=true)
     */
    private $eleveId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="cours_id", type="integer", nullable=true)
     */
    private $coursId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="semaine", type="integer", nullable=true)
     */
    private $semaine;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notion", type="text", length=65535, nullable=true)
     */
    private $notion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="eval", type="text", length=65535, nullable=true)
     */
    private $eval;

    /**
     * @var string|null
     *
     * @ORM\Column(name="commentaire", type="text", length=65535, nullable=true)
     */
    private $commentaire;

    private Eleve $eleve;
    private Cours $cours;
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
     * @return mixed
     */
    public function getCoursId()
    {
        return $this->coursId;
    }

    /**
     * @param mixed $coursId
     */
    public function setCoursId($coursId): void
    {
        $this->coursId = $coursId;
    }

    /**
     * @return int|null
     */
    public function getSemaine(): ?int
    {
        return $this->semaine;
    }

    /**
     * @param int|null $semaine
     */
    public function setSemaine(?int $semaine): void
    {
        $this->semaine = $semaine;
    }

    /**
     * @return string|null
     */
    public function getNotion(): ?string
    {
        return $this->notion;
    }

    /**
     * @param string|null $notion
     */
    public function setNotion(?string $notion): void
    {
        $this->notion = $notion;
    }

    /**
     * @return string|null
     */
    public function getEval(): ?string
    {
        return $this->eval;
    }

    /**
     * @param string|null $eval
     */
    public function setEval(?string $eval): void
    {
        $this->eval = $eval;
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

    /**
     * @return Cours
     */
    public function getCours(): Cours
    {
        return $this->cours;
    }

    /**
     * @param Cours $cours
     */
    public function setCours(Cours $cours): void
    {
        $this->cours = $cours;
    }


}
