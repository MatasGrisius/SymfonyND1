<?php
/**
 * Created by PhpStorm.
 * User: matt
 * DateValidationService: 18.4.13
 * Time: 12.17
 */

namespace App\Validation;


class DateValidationService
{
    public function validateDate($date, $format = 'Y-m-d')
    {
        $d = \DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }

    public function validateDateIntervalInDays($date, $daysBefore, $daysAfter) {
        $date = new \DateTime($date);
        $now = new \DateTime(Date('Y-m-d'));
        $daysDiff = (integer)$now->diff($date)->format("%r%a");
        return $daysDiff <= $daysAfter && $daysDiff >= -$daysBefore;
    }
}