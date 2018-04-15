<?php
/**
 * Created by PhpStorm.
 * User: matt
 * DateValidationService: 18.4.12
 * Time: 17.26
 */

namespace App\Weather;


use App\GoogleApi\WeatherService;
use App\Model\Weather;
use Symfony\Component\Cache\Simple\FilesystemCache;

class LoaderService
{
    /** @var WeatherService */
    private $googleWeatherService;

    /**
     * @var FilesystemCache
     */
    private $cacheService;

    /**
     * LoaderService constructor.
     * @param WeatherService $googleWeatherService
     * @param FilesystemCache $cacheService
     */
    public function __construct(WeatherService $googleWeatherService, FilesystemCache $cacheService)
    {
        $this->googleWeatherService = $googleWeatherService;
        $this->cacheService = $cacheService;
    }


    /**
     * @param \DateTime $day
     * @return Weather
     * @throws \Exception
     */
    public function getDay(\DateTime $day) : Weather
    {
        $cacheKey = $this->getCacheKey($day);
        if ($this->cacheService->has($cacheKey)) {
            $weather = $this->cacheService->get($cacheKey);
        } else {
            $weather = $this->googleWeatherService->getDay($day);
            $this->cacheService->set($cacheKey, $weather);
        }

        return $weather;
    }

    /**
     * @param \DateTime $day
     * @return string
     */
    public function getCacheKey(\DateTime $day)
    {
        return $day->format("Y-m-d");
    }

}