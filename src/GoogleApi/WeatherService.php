<?php
/**
 * Created by PhpStorm.
 * User: matt
 * DateValidationService: 18.4.10
 * Time: 19.18
 */

namespace App\GoogleApi;



use App\Model\NullWeather;
use App\Model\Weather;

class WeatherService
{
    /**
     * @return Weather
     * @throws \Exception
     */
    public function getToday()
    {
        $today = $this->load(new NullWeather());
        $today->setDate(new \DateTime());

        return $today;
    }

    /**
     * @param \DateTime $day
     * @return Weather
     * @throws \Exception
     */

    public function getDay(\DateTime $day) : Weather
    {
        $today = $this->load(new NullWeather());
        $today->setDate($day);
        return $today;
    }

    /**
     * @param Weather $before
     * @return Weather
     * @throws \Exception
     */
    private function load(Weather $before)
    {
        $now = new Weather();
        $base = $before->getDayTemp();
        $now->setDayTemp(random_int(5 - $base, 5 + $base));

        $base = $before->getNightTemp();
        $now->setNightTemp(random_int(-5 - abs($base), -5 + abs($base)));

        $now->setSky(random_int(1, 3));

        return $now;
    }
}