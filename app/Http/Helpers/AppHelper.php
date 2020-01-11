<?php
namespace App\Http\Helpers;


use App\Event;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;

class AppHelper {

	const weekDays = [
		0 => "Sunday",
		1 => "Monday",
		2 => "Tuesday",
		3 => "Wednesday",
		4 => "Thursday",
		5 => "Friday",
		6 => "Saturday",
	];

	const LANGUEAGES = [
		'en' => 'English',
		'fr' => 'French',
	];
	const USER_ADMIN = 1;
	const USER_TEACHER = 2;
	const USER_STUDENT = 3;
	const USER_PARENTS = 4;
	const USER_ACCOUNTANT = 5;
	const USER_LIBRARIAN = 6;
	const USER_RECEPTIONIST = 7;
	const ACTIVE = '1';
	const INACTIVE = '0';
	const EMP_TEACHER = AppHelper::USER_TEACHER;
	const EMP_SHIFTS = [
		1 => 'Day',
		2 => 'Night',
	];
	const GENDER = [
		1 => 'Male',
		2 => 'Female',

	];
	const RELIGION = [
		1 => 'Islam',
		2 => 'Bantou',
		3 => 'Cristian',
		4 => 'Buddhist',
		5 => 'Other',
	];

	const BLOOD_GROUP = [
		1 => 'A+',
		2 => 'O+',
		3 => 'B+',
		4 => 'AB+',
		5 => 'A-',
		6 => 'O-',
		7 => 'B-',
		8 => 'AB-',
	];

	const SUBJECT_TYPE = [
		1 => 'Core',
		2 => 'Electives',
	];

	const ATTENDANCE_TYPE = [
		0 => 'Absent',
		1 => 'Present',
	];

	const TEMPLATE_TYPE = [
		1 => 'SMS',
		2 => 'EMAIL',
		3 => 'ID CARD',
	];

	const SMS_GATEWAY_LIST = [
		1 => 'Bulk SMS Route',
		2 => 'IT Solutionbd',
		3 => 'Zaman IT',
		4 => 'MIM SMS',
		5 => 'Twilio',
		6 => 'Doze Host',
		7 => 'Log Locally',
	];

	const LEAVE_TYPES = [
		1 => 'Casual leave (CL)',
		2 => 'Sick leave (SL)',
		3 => 'Undefined leave (UL)',
	];

	const MARKS_DISTRIBUTION_TYPES = [
		1 => "Written",
		2 => "MCQ",
		3 => "SBA",
		4 => "Attendance",
		5 => "Assignment",
		6 => "Lab Report",
		7 => "Practical",
	];

	const GRADE_TYPES = [
		1 => 'A+',
		2 => 'A',
		3 => 'A-',
		4 => 'B',
		5 => 'C',
		6 => 'D',
		7 => 'F',
	];
	const PASSING_RULES = [1 => 'Over All', 2 => 'Individual', 3 => 'Over All & Individual'];


	/**
	 * @param Carbon $start_date
	 * @param Carbon $end_date
	 * @param bool $checkWeekends
	 * @param array $weekendDays
	 * @return array
	 */
	public static function generateDateRangeForReport(Carbon $start_date, Carbon $end_date, $checkWeekends = false, $weekendDays = [], $exludeWeekends = false) {

		$dates = [];
		for ($date = $start_date->copy(); $date->lte($end_date); $date->addDay()) {
			if ($checkWeekends) {
				$weekend = 0;
				if (in_array($date->dayOfWeek, $weekendDays)) {
					$weekend = 1;
				}

				if ($exludeWeekends) {
					if (!$weekend) {
						$dates[$date->format('Y-m-d')] = intval($date->format('d'));
					}
					continue;
				}

				$dates[$date->format('Y-m-d')] = [
					'day' => intval($date->format('d')),
					'weekend' => $weekend,
				];

			} else {
				$dates[$date->format('Y-m-d')] = intval($date->format('d'));
			}

		}

		return $dates;
	}
	public static function get_time($time) {
		$split = explode(':', $time);
		return $split[0] . ':' . $split[1];
	}

	public static function getmonth($id) {
		switch ($id) {
		case 1:
			return "January";
			break;
		case 2:
			return "February";
			break;
		case 3:
			return "Merch";
			break;
		case 4:
			return "Aprail";
			break;
		case 5:
			return "May";
			break;

		case 6:
			return "June";
			break;
		case 7:
			return "July";
			break;
		case 8:
			return "August";
			break;
		case 9:
			return "September";
			break;
		case 10:
			return "Octobor";
			break;
		case 11:
			return "November";
			break;
		case 12:
			return "December";
			break;
		case -1:
			return "Others";
			break;
		default:
			return "No month";
		}
	}

		public static function getmonthbyedor($id) {
	  if ($id ==01) {
	  	return 'January';
	  }

	  elseif($id ==02)
	  {
	  	return 'February';
	  }
	   elseif($id ==03)
	  {
	  	return 'Merch';
	  }
	   elseif($id ==04)
	  {
	  	return 'Aprail';
	  }
	   elseif($id ==05)
	  {
	  	return 'May';
	  }
	   elseif($id ==06)
	  {
	  	return 'June';
	  }

	   elseif($id ==07)
	  {
	  	return 'July';
	  }
	   elseif($id == '08')
	  {
	  	return 'August';
	  }
	   elseif($id == '09')
	  {
	  	return 'September';
	  }
	   elseif($id ==10)
	  {
	  	return 'October';
	  }
	   elseif($id ==11)
	  {
	  	return 'November';
	  }  elseif($id ==12)
	  {
	  	return 'December';
	  }
	}

public static  function religion($id)
{
			switch ($id) {
		case 'Islam':
			return 1;
			break;
		case 'Hindu':
			return 2;
			break;
		case 'Cristian':
			return 3;
			break;
		case 'Buddhist':
			return 4;
			break;
		case 'Other':
			return 5;
			break;
		default:
			return "No Math";
		}
}

public static  function gender($id)
{
			switch ($id) {
		case 'Male':
			return 1;
			break;
		case 'Female':
			return 2;
			break;
		default:
			return "No Math";
		}
}

public static  function Blood($id)
{
			switch ($id) {
		case 'A+':
			return 1;
			break;
		case 'O+':
			return 2;
			break;
		case 'B+':
			return 3;
			break;
		case 'AB+':
			return 4;
			break;
		case 'A-':
			return 5;
			break;
		case 'O-':
			return 6;
			break;
		case 'B-':
			return 7;
			break;
		case 'AB-':
			return 8;
			break;
		default:
			return "No Math";
		}
	}
}