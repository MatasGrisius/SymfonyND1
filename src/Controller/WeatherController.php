<?php

namespace App\Controller;

use App\Model\NullWeather;
use App\Validation\DateValidationService;
use App\Weather\LoaderService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class WeatherController extends AbstractController
{
    /**
     * @param $day
     * @param LoaderService $loaderService
     * @param DateValidationService $dateValidationService
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function index($day, LoaderService $loaderService, DateValidationService $dateValidationService)
    {
        $response = [];

        if ($dateValidationService->validateDate($day)) {
            if ($dateValidationService->validateDateIntervalInDays($day, 0, 60)) {
                $weather = $loaderService->getDay(new \DateTime($day));

                $response['success'] = true;
                $response['weather_data'] = [
                    'date' => $weather->getDate()->format("Y-m-d"),
                    'nightTemp' => $weather->getNightTemp(),
                    'dayTemp' => $weather->getDayTemp(),
                    'sky' => $weather->getSky()
                ];
            } else {
                $response['success'] = false;
                $response['error'] = "interval";
            }
        } else {
            $response['success'] = false;
            $response['error'] = "format";
        }

        return $this->render('weather/index.html.twig', $response);
    }
}
