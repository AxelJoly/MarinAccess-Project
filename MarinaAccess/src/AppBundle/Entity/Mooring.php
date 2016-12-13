<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @var string
     *
     * @ORM\Column(name="numPlace", type="string", length=255, unique=true)
     */
    private $numPlace;

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
     * @ORM\Column(name="bateauTitu", type="string", length=255, unique=true)
     */
    private $bateauTitu;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length="255")
     */
    private $etat;

    /**
     * @var string
     *
     * @ORM\Column(name="bateauAmarre", type="string", length=255)
     */
    private $bateauAmarre;


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
}

