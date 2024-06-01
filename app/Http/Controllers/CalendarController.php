<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Classes\Calendar;

class CalendarController extends Controller
{
    //
		private $events;

    public function index() {
			$numberOfDays = cal_days_in_month(CAL_GREGORIAN,date('m'),date('Y'));


			return view('calendar', [
				'days' => $numberOfDays
			]);
    }

		public function add_event($txt, $date, $days = 1, $color = '') {
			$color = $color ? ' ' . $color : $color;
			$this->events[] = [$txt, $date, $days, $color];
	}
}
