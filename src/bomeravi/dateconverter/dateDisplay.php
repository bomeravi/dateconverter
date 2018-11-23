<?php
namespace Bomeravi\dateConverter;

class dateDisplay {
	
	public static function single_nep_month($m){
	
	}
	
	private function get_short_month($m)
	{
		$eMonth = FALSE;
		switch ($m)
		{
			case 1:
				$eMonth = "Jan";
				break;
			case 2:
				$eMonth = "Feb";
				break;
			case 3:
				$eMonth = "Mar";
				break;
			case 4:
				$eMonth = "Apr";
				break;
			case 5:
				$eMonth = "May";
				break;
			case 6:
				$eMonth = "Jun";
				break;
			case 7:
				$eMonth = "Jul";
				break;
			case 8:
				$eMonth = "Aug";
				break;
			case 9:
				$eMonth = "Sep";
				break;
			case 10:
				$eMonth = "Oct";
				break;
			case 11:
				$eMonth = "Nov";
				break;
			case 12:
				$eMonth = "Dec";
		}
		return $eMonth;
	}
	
	private function get_full_month($m)
	{
		$eMonth = FALSE;
		switch ($m)
		{
			case 1:
				$eMonth = "January";
				break;
			case 2:
				$eMonth = "February";
				break;
			case 3:
				$eMonth = "March";
				break;
			case 4:
				$eMonth = "April";
				break;
			case 5:
				$eMonth = "May";
				break;
			case 6:
				$eMonth = "June";
				break;
			case 7:
				$eMonth = "July";
				break;
			case 8:
				$eMonth = "August";
				break;
			case 9:
				$eMonth = "September";
				break;
			case 10:
				$eMonth = "October";
				break;
			case 11:
				$eMonth = "November";
				break;
			case 12:
				$eMonth = "December";
		}
		return $eMonth;
	}
	
	public static function get_nepali_month($m)
	{
		$n_month = FALSE;
		switch ($m)
		{
			case 1:
				$n_month = "बैशाख";
				break;
			case 2:
				$n_month = "जेठ";
				break;
			case 3:
				$n_month = "असार";
				break;
			case 4:
				$n_month = "साउन";
				break;
			case 5:
				$n_month = "भदौ";
				break;
			case 6:
				$n_month = "असोज";
				break;
			case 7:
				$n_month = "कार्तिक";
				break;
			case 8:
				$n_month = "मंसिर";
				break;
			case 9:
				$n_month = "पौष";
				break;
			case 10:
				$n_month = "माघ";
				break;
			case 11:
				$n_month = "फाल्गुण";
				break;
			case 12:
				$n_month = "चैत";
				break;
		}
		return $n_month;
	}
	
	public static function get_nep_full_month($m)
	{
		$n_month = FALSE;
		switch ($m)
		{
			case 1:
				$n_month = "Baishak";
				break;
			case 2:
				$n_month = "Jestha";
				break;
			case 3:
				$n_month = "Ashad";
				break;
			case 4:
				$n_month = "Shrawn";
				break;
			case 5:
				$n_month = "Bhadra";
				break;
			case 6:
				$n_month = "Ashwin";
				break;
			case 7:
				$n_month = "Kartik";
				break;
			case 8:
				$n_month = "Mangshir";
				break;
			case 9:
				$n_month = "Poush";
				break;
			case 10:
				$n_month = "Magh";
				break;
			case 11:
				$n_month = "Falgun";
				break;
			case 12:
				$n_month = "Chaitra";
				break;
		}
		return $n_month;
	}
	
	public static function get_nep_short_month($m)
	{
		$n_month = FALSE;
		switch ($m)
		{
			case 1:
				$n_month = "Baishak";
				break;
			case 2:
				$n_month = "Jestha";
				break;
			case 3:
				$n_month = "Ashad";
				break;
			case 4:
				$n_month = "Shrawn";
				break;
			case 5:
				$n_month = "Bhadra";
				break;
			case 6:
				$n_month = "Ashwin";
				break;
			case 7:
				$n_month = "Kartik";
				break;
			case 8:
				$n_month = "Mangshir";
				break;
			case 9:
				$n_month = "Poush";
				break;
			case 10:
				$n_month = "Magh";
				break;
			case 11:
				$n_month = "Falgun";
				break;
			case 12:
				$n_month = "Chaitra";
				break;
		}
		return $n_month;
	}
	
	
	public static function get_full_day_of_week($day)
	{
		switch ($day)
		{
			case 1:
				$day = "Sunday";
				break;
			case 2:
				$day = "Monday";
				break;
			case 3:
				$day = "Tuesday";
				break;
			case 4:
				$day = "Wednesday";
				break;
			case 5:
				$day = "Thursday";
				break;
			case 6:
				$day = "Friday";
				break;
			case 7:
				$day = "Saturday";
				break;
		}
		return $day;
	}
	
	public static function get_short_day_of_week($day)
	{
		switch ($day)
		{
			case 1:
				$day = "Sun";
				break;
			case 2:
				$day = "Mon";
				break;
			case 3:
				$day = "Tue";
				break;
			case 4:
				$day = "Wed";
				break;
			case 5:
				$day = "Thu";
				break;
			case 6:
				$day = "Fri";
				break;
			case 7:
				$day = "Sat";
				break;
		}
		return $day;
	}
	
	public static function get_nepali_day_of_week($day)
	{
		switch ($day)
		{
			case 1:
				$day = "आइतवार";
				break;
			case 2:
				$day = "सोमवार";
				break;
			case 3:
				$day = "मंगलवार";
				break;
			case 4:
				$day = "वुधवार";
				break;
			case 5:
				$day = "विहीवार";
				break;
			case 6:
				$day = "शुक्रवार";
				break;
			case 7:
				$day = "शनिवार";
				break;
		}
		return $day;
	}
	
	public static function get_nep_day_of_week($day)
	{
		switch ($day)
		{
			case 1:
				$day = "आइत";
				break;
			case 2:
				$day = "सोम";
				break;
			case 3:
				$day = "मंगल";
				break;
			case 4:
				$day = "वुध";
				break;
			case 5:
				$day = "विही";
				break;
			case 6:
				$day = "शुक्र";
				break;
			case 7:
				$day = "शनि";
				break;
		}
		return $day;
	}

	
}
?>