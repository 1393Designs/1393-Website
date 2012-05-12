<?

function getUsers() {
	$str = query_select('*', TABLE_USER);
	return $str;
} // getUsers

function getBio($id) {
	
	$where = 'id='.$id;
	$str = query_select_one('*', TABLE_USER, $where);
	return $str;
	
} // getBio


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