<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Delegation
 *
 * @ORM\Table(name="delegation", indexes={@ORM\Index(name="id_gov", columns={"id_gov"})})
 * @ORM\Entity
 */
class Delegation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=100, nullable=false)
     */
    private $libelle;

    /**
     * @var Gouvernorat
     *
     * @ORM\ManyToOne(targetEntity="Gouvernorat")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_gov", referencedColumnName="id")
     * })
     */
    private $idGov;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * @param string $libelle
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    }

    /**
     * @return Gouvernorat
     */
    public function getIdGov()
    {
        return $this->idGov;
    }

    /**
     * @param Gouvernorat $idGov
     */
    public function setIdGov($idGov)
    {
        $this->idGov = $idGov;
    }



}

