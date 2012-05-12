<?


	function query_select($fields, $table, $where='1') {
	
		db();
		$query = "SELECT $fields FROM $table WHERE $where";
		$result = mysql_query($query) or die(mysql_error());
		$output = array();
		while($row = mysql_fetch_array($result)) {
			$output[] = $row;
		}
		mysql_close();
		return $output;
	} // end query_select
	
	function query_select_one($fields, $table, $where='1') {
	
		db();
		$query = "SELECT $fields FROM $table WHERE $where";
		$result = mysql_query($query) or die(mysql_error());
		$output = '';
		while($row = mysql_fetch_array($result)) {
			$output = $row;
		}
		mysql_close();
		return $output;
	} // end query_select_one


	
	function ago($time) {
   $periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
   $lengths = array("60","60","24","7","4.35","12","10");

   $now = time();

       $difference     = $now - $time;
       $tense         = "ago";

   for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
       $difference /= $lengths[$j];
   }

   $difference = round($difference);

   if($difference != 1) {
       $periods[$j].= "s";
   }

   return "$difference $periods[$j] ago";
 }
 
 
 
 ?>