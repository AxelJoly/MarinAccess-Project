<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\User;

/**
 * Mooring
 *
 * @ORM\Table(name="mooring")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MooringRepository")
 */
class Mooring
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
     * @var float
     *
     * @ORM\Column(name="longueurMax", type="float")
     */
    private $longueurMax;

    /**
     * @var float
     *
     * @ORM\Column(name="largeurMax", type="float")
     */
    private $largeurMax;

    /**
     * @var float
     *
     * @ORM\Column(name="tirantEauMax", type="float")
     */
    private $tirantEauMax;



    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=255)
     */
    private $etat;

    /**
     * @var string
     *
     * @ORM\OneToOne(targetEntity="Boat")
     *
     */
    private $bateauAmarre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateOccupation", type="datetime", nullable = true)
     */
    private $dateOccupation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateLiberation", type="datetime", nullable = true)
     */
    private $dateLiberation;

    /**
     *
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="mooring")
     * @ORM\JoinColumn(name="proprietaire_mail", referencedColumnName="mail")
     */
    private $proprietaire;

// @ORM\Column(name="place", type="string", length=5)
    /**
     * @var string

     * @ORM\OneToOne(targetEntity="Seat")
     */
    private $place;


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
     * Set numPlace
     *
     * @param string $numPlace
     *
     * @return Mooring
     */
    public function setNumPlace($numPlace)
    {
        $this->numPlace = $numPlace;

        return $this;
    }

    /**
     * Get numPlace
     *
     * @return string
     */
    public function getNumPlace()
    {
        return $this->numPlace;
    }

    /**
     * Set longueurMax
     *
     * @param float $longueurMax
     *
     * @return Mooring
     */
    public function setLongueurMax($longueurMax)
    {
        $this->longueurMax = $longueurMax;

        return $this;
    }

    /**
     * Get longueurMax
     *
     * @return float
     */
    public function getLongueurMax()
    {
        return $this->longueurMax;
    }

    /**
     * Set largeurMax
     *
     * @param float $largeurMax
     *
     * @return Mooring
     */
    public function setLargeurMax($largeurMax)
    {
        $this->largeurMax = $largeurMax;

        return $this;
    }

    /**
     * Get largeurMax
     *
     * @return float
     */
    public function getLargeurMax()
    {
        return $this->largeurMax;
    }

    /**
     * Set tirantEauMax
     *
     * @param float $tirantEauMax
     *
     * @return Mooring
     */
    public function setTirantEauMax($tirantEauMax)
    {
        $this->tirantEauMax = $tirantEauMax;

        return $this;
    }

    /**
     * Get tirantEauMax
     *
     * @return float
     */
    public function getTirantEauMax()
    {
        return $this->tirantEauMax;
    }

    /**
     * Set bateauTitu
     *
     * @param string $bateauTitu
     *
     * @return Mooring
     */
    public function setBateauTitu($bateauTitu)
    {
        $this->bateauTitu = $bateauTitu;

        return $this;
    }

    /**
     * Get bateauTitu
     *
     * @return string
     */
    public function getBateauTitu()
    {
        return $this->bateauTitu;
    }

    /**
     * Set etat
     *
     * @param boolean $etat
     *
     * @return Mooring
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return bool
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set bateauAmarre
     *
     * @param string $bateauAmarre
     *
     * @return Mooring
     */
    public function setBateauAmarre($bateauAmarre)
    {
        $this->bateauAmarre = $bateauAmarre;

        return $this;
    }

    /**
     * Get bateauAmarre
     *
     * @return string
     */
    public function getBateauAmarre()
    {
        return $this->bateauAmarre;
    }

    /**
     * Set dateOccupation
     *
     * @param \DateTime $dateOccupation
     *
     * @return Boat
     */
    public function setDateOccupation($dateOccupation)
    {
        $this->dateOccupation = $dateOccupation;

        return $this;
    }

    /**
     * Get dateOccupation
     *
     * @return \DateTime
     */
    public function getDateOccupation()
    {
        return $this->dateOccupation;
    }

    /**
     * Set dateLiberation
     *
     * @param \DateTime $dateLiberation
     *
     * @return Boat
     */
    public function setDateLiberation($dateLiberation)
    {
        $this->dateLiberation = $dateLiberation;

        return $this;
    }

    /**
     * Get dateLiberation
     *
     * @return \DateTime
     */
    public function getDateLiberation()
    {
        return $this->dateLiberation;
    }

    /**
     * @return string
     */
    public function getProprietaire()
    {
        return $this->proprietaire;
    }

    /**
     * @param string $proprietaire
     */
    public function setProprietaire($proprietaire)
    {
        $this->proprietaire = $proprietaire;
    }

    public function getPlace()
    {
        return $this->place;
    }

    public function setPlace($place)
    {
        $this->place = $place;
    }


}

