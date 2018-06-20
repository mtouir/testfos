<?php
/**
 * Created by PhpStorm.
 * User: marwensabri
 * Date: 18/06/2018
 * Time: 05:13
 */

namespace UserBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints As Assert ;

/**
 * Class AnnonceAnimal
 * @ORM\Entity(repositoryClass="UserBundle\Repository\AnnonceAnimalRepository")
 */

class AnnonceAnimal
{
    /**
     * @ORM\GeneratedValue
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\ManyToOne(targetEntity="TypeAnnonce")
     */
    private $TypeAnnonce;

    /**
     * @ORM\Column(type="date")
     */
    private $datenaissance;
    /**
     * @ORM\Column(type="integer")
     * @Assert\Type("integer")
     */
    private $identification=0;
    /**
     * @ORM\Column(type="integer")
     *
     * @Assert\Type("integer")
     */
    private $nombre=1;
    /**
     * @ORM\Column(type="string",length=255)
     */
    private $sexe = 'none';
    /**
     * @ORM\Column(name="genealogique", type="boolean", options={"default":false})
     */
    private $genealogique;
    /**
     * @ORM\Column(type="string",length=255)
     */
    private $race='none';
    /**
     * @ORM\Column(type="string",length=255)
     */
    private $pelage = 'none';
    /**
     * @ORM\Column(type="string",length=255)
     * @Assert\NotBlank()
     */
    private $titre;
    /**
     * @ORM\Column(type="string",length=2000)
     * @Assert\NotBlank()
     */
    private $text;
    /**
     * @ORM\Column(type="date")
     */
    private $duree;
    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     * @Assert\Type("integer")
     */
    private $prix;
    /**
     * @ORM\Column(type="string",length=255)
     * @Assert\NotBlank()
     *
     */
    private $ville;
    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     * @Assert\Type("integer")
     */
    private $postal;


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTypeAnnonce()
    {
        return $this->TypeAnnonce;
    }

    /**
     * @param mixed $TypeAnnonce
     */
    public function setTypeAnnonce($TypeAnnonce)
    {
        $this->TypeAnnonce = $TypeAnnonce;
    }

    /**
     * @return mixed
     */
    public function getDatenaissance()
    {
        return $this->datenaissance;
    }

    /**
     * @param mixed $datenaissance
     */
    public function setDatenaissance($datenaissance)
    {
        $this->datenaissance = $datenaissance;
    }

    /**
     * @return mixed
     */
    public function getIdentification()
    {
        return $this->identification;
    }

    /**
     * @param mixed $identification
     */
    public function setIdentification($identification)
    {
        $this->identification = $identification;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * @param mixed $sexe
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;
    }

    /**
     * @return mixed
     */
    public function getGenealogique()
    {
        return $this->genealogique;
    }

    /**
     * @param mixed $genealogique
     */
    public function setGenealogique($genealogique)
    {
        $this->genealogique = $genealogique;
    }

    /**
     * @return mixed
     */
    public function getRace()
    {
        return $this->race;
    }

    /**
     * @param mixed $race
     */
    public function setRace($race)
    {
        $this->race = $race;
    }

    /**
     * @return mixed
     */
    public function getPelage()
    {
        return $this->pelage;
    }

    /**
     * @param mixed $pelage
     */
    public function setPelage($pelage)
    {
        $this->pelage = $pelage;
    }

    /**
     * @return mixed
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param mixed $titre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param mixed $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return mixed
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * @param mixed $duree
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;
    }

    /**
     * @return mixed
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @param mixed $prix
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    }

    /**
     * @return mixed
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param mixed $ville
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
    }

    /**
     * @return mixed
     */
    public function getPostal()
    {
        return $this->postal;
    }

    /**
     * @param mixed $postal
     */
    public function setPostal($postal)
    {
        $this->postal = $postal;
    }




}
