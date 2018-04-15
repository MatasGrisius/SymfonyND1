<?php
/**
 * Created by PhpStorm.
 * User: matt
 * DateValidationService: 18.4.10
 * Time: 19.02
 */

namespace App\Model;


class Weather
{
    const SUNNY = 1;
    const CLOUDY = 2;
    const RAINING = 3;

    /**
     * @var integer
     */
    protected $dayTemp;

    /**
     * @var integer
     */
    protected $nightTemp;

    /**
     * @var int
     */
    protected $sky;

    /**
     * @var \DateTime
     */
    protected $date;

    /**
     * @return int
     */
    public function getDayTemp(): int
    {
        return $this->dayTemp;
    }

    /**
     * @param int $dayTemp
     * @return Weather
     */
    public function setDayTemp(int $dayTemp): Weather
    {
        $this->dayTemp = $dayTemp;
        return $this;
    }

    /**
     * @return int
     */
    public function getNightTemp(): int
    {
        return $this->nightTemp;
    }

    /**
     * @param int $nightTemp
     * @return Weather
     */
    public function setNightTemp(int $nightTemp): Weather
    {
        $this->nightTemp = $nightTemp;
        return $this;
    }

    /**
     * @return int
     */
    public function getSky(): int
    {
        return $this->sky;
    }

    /**
     * @param int $sky
     * @return Weather
     */
    public function setSky(int $sky): Weather
    {
        $this->sky = $sky;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDate(): \DateTime
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     * @return Weather
     */
    public function setDate(\DateTime $date): Weather
    {
        $this->date = $date;
        return $this;
    }
}