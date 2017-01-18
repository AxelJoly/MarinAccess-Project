<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Boat
 *
 * @ORM\Table(name="boat")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Entity\BoatRepository")
 */
class Boat
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="immatriculation", type="string", length=255, unique=true)
     */
    private $immatriculation;

    /**
     * @var string
     *
     * @ORM\Column(name="proprietaire", type="string", length=255, unique=true)
     */
    private $proprietaire;


    /**
     * @var string
     *
     * @ORM\Column(name="portAttache", type="string", length=255)
     */
    private $portAttache;

    /**
     * @var float
     *
     * @ORM\Column(name="longueur", type="float")
     */
    private $longueur;

    /**
     * @var float
     *
     * @ORM\Column(name="largeur", type="float")
     */
    private $largeur;


    /**
     *
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="capitaine_mail", referencedColumnName="mail")
     */

    private $capitaine;

    /**
     * @var float
     *
     * @ORM\Column(name="tirantEau", type="float")
     */
    private $tirantEau;




    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set immatriculation
     *
     * @param string $immatriculation
     *
     * @return Boat
     */
    public function setImmatriculation($immatriculation)
    {
        $this->immatriculation = $immatriculation;

        return $this;
    }

    /**
     * Get immatriculation
     *
     * @return string
     */
    public function getImmatriculation()
    {
        return $this->immatriculation;
    }

    /**
     * Set proprietaire
     *
     * @param string $proprietaire
     *
     * @return Boat
     */
    public function setProprietaire($proprietaire)
    {
        $this->proprietaire = $proprietaire;

        return $this;
    }

    /**
     * Get proprietaire
     *
     * @return string
     */
    public function getProprietaire()
    {
        return $this->proprietaire;
    }

    /**
     * Set nomProprio
     *
     * @param string $nomProprio
     *
     * @return Boat
     */
    public function setNomProprio($nomProprio)
    {
        $this->nomProprio = $nomProprio;

        return $this;
    }

    /**
     * Get nomProprio
     *
     * @return string
     */
    public function getNomProprio()
    {
        return $this->nomProprio;
    }

    /**
     * Set portAttache
     *
     * @param string $portAttache
     *
     * @return Boat
     */
    public function setPortAttache($portAttache)
    {
        $this->portAttache = $portAttache;

        return $this;
    }

    /**
     * Get portAttache
     *
     * @return string
     */
    public function getPortAttache()
    {
        return $this->portAttache;
    }

    /**
     * Set longueur
     *
     * @param integer $longueur
     *
     * @return Boat
     */
    public function setLongueur($longueur)
    {
        $this->longueur = $longueur;

        return $this;
    }

    /**
     * Get longueur
     *
     * @return int
     */
    public function getLongueur()
    {
        return $this->longueur;
    }

    /**
     * Set largeur
     *
     * @param integer $largeur
     *
     * @return Boat
     */
    public function setLargeur($largeur)
    {
        $this->largeur = $largeur;

        return $this;
    }

    /**
     * Get largeur
     *
     * @return int
     */
    public function getLargeur()
    {
        return $this->largeur;
    }

    /**
     * Set capitaine
     *
     * @param string $capitaine
     *
     * @return Boat
     */
    public function setCapitaine($capitaine)
    {
        $this->capitaine = $capitaine;

        return $this;
    }

    /**
     * Get capitaine
     *
     * @return string
     */
    public function getCapitaine()
    {
        return $this->capitaine;
    }

    /**
     * Set tirantEau
     *
     * @param integer $tirantEau
     *
     * @return Boat
     */
    public function setTirantEau($tirantEau)
    {
        $this->tirantEau = $tirantEau;

        return $this;
    }

    /**
     * Get tirantEau
     *
     * @return int
     */
    public function getTirantEau()
    {
        return $this->tirantEau;
    }


}

