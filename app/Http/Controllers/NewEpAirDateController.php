<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class NewEpAirDateController extends Controller
{
    public function calculateDate($broadcastDate) {
        $days = [
            'Monday',
            'Tuesday',
            'Wednesday',
            'Thursday',
            'Friday',
            'Saturday',
            'Sunday',
        ];
        switch($broadcastDate) {
            case strpos($broadcastDate, 'Monday'):
                return $this->getDateByDay('Monday');
            break;
            case strpos($broadcastDate, 'Tuesday'):
                return $this->getDateByDay('Tuesday');
            break;
            case strpos($broadcastDate, 'Wednesday'):
                return $this->getDateByDay('Wednesday');
            break;
            case strpos($broadcastDate, 'Thursday'):
                return $this->getDateByDay('Thursday');
            break;
            case strpos($broadcastDate, 'Friday'):
                return $this->getDateByDay('Friday');
            break;
            case strpos($broadcastDate, 'Saturday'):
                return $this->getDateByDay('Saturday');
            break;
            case strpos($broadcastDate, 'Sunday'):
                return $this->getDateByDay('Sunday');
            break;
        }
    }

    public function getDateByDay($day) {
        return date("l") === $day ? date("j/n/Y") : date("j/n/Y", strtotime ("next ".$day));
    }
}
