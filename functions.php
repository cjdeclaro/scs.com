<?php
	date_default_timezone_set("Asia/Manila"); //Sets the time zone

	$domainname="https://scs.com";

	//GENERATORS

	function generateid() {
		$conn = $GLOBALS['conn'];

		$Query = "SELECT ID FROM `documents`";
		$Result = mysqli_query($conn ,$Query);
		$count = mysqli_num_rows($Result);
		$count+=1;

		$paddedcount = str_pad($count, 4, '0', STR_PAD_LEFT);

		$lname = $_SESSION['lname'];
		$fname = $_SESSION['fname'];

		$name_firstchar = substr($fname, 0, 1);
		$namecode = strtolower(str_replace(' ', '',$lname.$name_firstchar));

		$date = date("mdY-Hi");

		return $paddedcount."-".$date."-".$namecode; //Returns string of type: 0000-12312018-2459-lastnamef
	}

	function generatenamecode($lname,$fname) { //Requires Last Name, First Name

		$name_firstchar = substr($fname, 0, 1);
		$namecode = strtolower(str_replace(' ', '',$lname.$name_firstchar));

		return $namecode; //Returns: lastnamef
	}

	//SQL FUNCTIONS

	function getResult($Query){ //Requires Query eg. "SELECT * FROM tbl"
		$conn = $GLOBALS['conn'];
		$Result = mysqli_query($conn ,$Query);
		return $Result; //Returns SQL Result - use loop to go through the data
	}

	//DATE TIME FUNCTIONS

	//////////////////////////////////////////////////////////////////////
	//INPUT FORMAT: YYYY-MM-DD 00:00:00
	//RESULT FORMAT:
	// '%y Year %m Month %d Day %h Hours %i Minute %s Seconds'        =>  1 Year 3 Month 14 Day 11 Hours 49 Minute 36 Seconds
	// '%y Year %m Month %d Day'                                    =>  1 Year 3 Month 14 Days
	// '%m Month %d Day'                                            =>  3 Month 14 Day
	// '%d Day %h Hours'                                            =>  14 Day 11 Hours
	// '%d Day'                                                        =>  14 Days
	// '%h Hours %i Minute %s Seconds'                                =>  11 Hours 49 Minute 36 Seconds
	// '%i Minute %s Seconds'                                        =>  49 Minute 36 Seconds
	// '%h Hours                                                    =>  11 Hours
	// '%a Days                                                        =>  468 Days
	//////////////////////////////////////////////////////////////////////
	function dateduration_hours($date_1 , $date_2) //Gets 2 date values
	{
		$datetime1 = date_create($date_1);
		$datetime2 = date_create($date_2);

		$interval = date_diff($datetime1, $datetime2);

		$years = $interval->format('%y');
		$months = $interval->format('%m');
		$days = $interval->format('%a');
		$hours = $interval->format('%h');
		$minutes = $interval->format('%i');

		$hours += (24 * $days);

		return $hours; //Returns hours between each date
	}

	function dateduration_hours_minutes($date_1 , $date_2) //Gets 2 date values
	{
		$datetime1 = date_create($date_1);
		$datetime2 = date_create($date_2);

		$interval = date_diff($datetime1, $datetime2);

		$elapsed = $interval->format("%a days %h hrs %i mins"); //Output format of the date eg. 43 days 5 hrs 32 mins

		return $elapsed; //Returns date interval of each value in stated format
	}

	function getTime(){
		$today = date("Y-m-d H:i:s"); //output format
		return $today; //Returns the current date and time
	}

	function getYear(){
		$today = date("Y");
		return $today; //Returns the current year
	}
?>