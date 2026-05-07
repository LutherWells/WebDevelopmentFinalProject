<?php 

function relativeTime($date) {
	if (empty($date)) {
		return "";
   }

	$periods = [ "second", "minute", "hour", "day", "week", "month", "year", "decade" ];
	$lengths = [ "60", "60", "24", "7", "4.35", "12", "10" ];

	$now = time();
	$unixDate = strtotime($date);

   // Check validity of date
	if (empty($unixDate)) {
		return "Bad date";
   }

	// Check if future or past date
	if ($now > $unixDate) {   
		$difference = $now - $unixDate;
		$tense = "ago";	   
	} 
	else {
		$difference = $unixDate - $now;
		$tense = "from now";
	}

	for ($i = 0; $difference >= $lengths[$i] && $i < count($lengths) - 1; $i++) {
		$difference /= $lengths[$i];
   }
	
	$difference = round($difference);

	if ($difference != 1) {
		$periods[$i] .= "s";
   }

	if ($difference == 0) {
		return "just now";
   }
		
	return "$difference $periods[$i] {$tense}";
}

?>