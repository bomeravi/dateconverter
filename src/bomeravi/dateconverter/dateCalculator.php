<?php
namespace Bomeravi\dateConverter;

class dateCalculator {
	private $start_date;
	private $temp_start_date;
	private $temp_end_date;
	private $end_date;
	private $include_day;
	private $step;
	private $by_month_day_step;
	private $by_month;
	private $by_week;
	private $total_days;
	private $full_diff;
	//for storing temp_values;
	private $temp_days;
	
	//returned datas;
	//real ;
	/* diff year y
		diff month m
		diff day d
		diff total_days = days;
		diff rem_days = 0;
		
		//for virtual for my isp;
		diff year = v_y
		diff month = v_m
		diff day = v_d
		diff total days = v_days
		diff rem_days = v_remdays;
		
		//for step;
		diff year = s_y
		diff month = s_m
		diff days = s_d
		diff total_days = s_days
		diff rem = s_remdays;
		*/
	
	
	
	
	public function __construct() {
		$this->include_day = true;
		$this->step = 30;
	}
	
	public function input_dates($date1, $date2=null, $include_day = true){
		if(!is_object($date1)){
		$this->start_date = new \DateTime($date1);
		}
		if($date2 != null){
			if(!is_object($date2)){
			$this->end_date = new \DateTime($date2);
			}
		}
		else {
			$this->end_date = new \DateTime;
		}
		$this->include_day = boolval($include_day);
		//var_dump($this);
	}
	
	
	private	function d_diff($date1, $date2){
		return  $date1->diff($date2);
	}
	
	public function add_from_today($day){ //expiry date calculation from today
		//echo $day;
		$ddate =   new \DateTime;//date("D-M-d");
		//var_dump($ddate);
		
		date_add($ddate, date_interval_create_from_date_string($day . " days"));
		return date_format($ddate, 'Y-m-d');
	}
	
	public function diff_in_weeks_and_days($from, $to) {
    $day   = 24 * 3600;
    $from  = strtotime($from);
    $to    = strtotime($to) + $day;
    $diff  = abs($to - $from);
    $weeks = floor($diff / $day / 7);
    $days  = $diff / $day - $weeks * 7;
    $out   = array();
    if ($weeks) $out[] = "$weeks Week" . ($weeks > 1 ? 's' : '');
    if ($days)  $out[] = "$days Day" . ($days > 1 ? 's' : '');
    return implode(', ', $out);
}

	public function no_of_weeks_and_days($tdays){
		$weeks = 0;
		$days = 0;
		$weeks = intval($tdays/7);
		$days = $tdays%7;
		    $out   = array();
    if ($weeks) $out[] = "$weeks Week" . ($weeks > 1 ? 's' : '');
    if ($days)  $out[] = "$days Day" . ($days > 1 ? 's' : '');
    return implode(', ', $out);
	}

	private function date_form($date , $t) {
		if($t == 'days'){
			return $date->format("%a");
		}
		
	}

	private function calculate_by_step($days, $step=30){
		$v_year = 0;
		$v_month = 0;
		$v_day = 0;
		$no_of_month = intval(365/$step);
		$v_day = $days % $step;
		$v_month = intval(( ($days - $v_day) / $step)% $no_of_month);
		$v_year = intval( ($days - $v_day) / ($no_of_month * $step));
		$v['s_y'] = $v_year;
		$v['s_m'] = $v_month;
		$v['s_d'] = $v_day;
		$v['s_rem'] = $step - $v_day;
		return $v;
		
	}
	
	private function process(){
		$date11 = clone $this->start_date;
		$date21 = clone $this->end_date;
		//var_dump($date11);
		if($this->include_day) {
			date_sub($date11, date_interval_create_from_date_string('1 day'));
			//$date11->add(new DateInterval('PT10H30S'));
			//$date11->modify('-1 day');
			//var_dump($this->date1);
		}
		
		$this->full_diff = $this->d_diff($date11, $this->end_date);
		$this->total_days = $this->date_form($diff, "days"); //get no of days eg 1261 days;
		
	}
	public function calculator() {
		
		//$st = $this->date1;
		$date11 = clone $this->start_date;
		$date21 = clone $this->end_date;
		//var_dump($date11);
		if($this->include_day) {
		if($this->start_date <= $this->end_date){
		
			//echo "it is executed";
			date_sub($date11, date_interval_create_from_date_string('1 day'));
			//$date11->add(new DateInterval('PT10H30S'));
			//$date11->modify('-1 day');
			//var_dump($this->date1);
		}
		else {
			date_sub($date21, date_interval_create_from_date_string('1 day'));
		}
		}
		
		
		$diff = $this->d_diff($date11, $date21);
		//var_dump($date11,$this->end_date,$diff);
		$fulldays = $this->date_form($diff, "days"); 
		//echo $fulldays;//get no of days eg 1261 days;
		$this->total_days = $this->date_form($diff, "days"); //get no of days eg 1261 days;
		$v = $this->calculate_by_step($fulldays); //calculate by step for no of days;
		
	//	$rem = 30 - $fulldays % 30; it is for isp
		$rem = 30-$diff->d;
		//$ttt = $this->from_today($rem);  // real expire date
		$days = ($this->end_date->format('d') + 30 - $date11->format('d')) % 30;
		return array(
			"y" => $diff->y,
			"m" => $diff->m,
			"d" => $diff->d,
			"v_d" => $days,
			"days" => $fulldays,
			
			"v_days" => $diff->y * 360 + $diff->m * 30 + $days,
			"rem_days" => $rem,
			'v_rem_days' => 30 - $days,
			'start_date' => date_format($this->start_date, "Y-m-d"),
		//	"expire_date" => $ttt,
			'v_expire_date' => date_format(date_add($this->end_date, date_interval_create_from_date_string(30-$days . " days")), "Y-m-d"),
			's_y' => $v['s_y'],
			's_m' => $v['s_m'],
			's_d' => $v['s_d'],
			's_rem' => $v['s_rem'],
			's_expire_date' => date_format(date_add($date21, date_interval_create_from_date_string($v['s_rem'] ." days")), "Y-m-d"),
		);
	
	}
}