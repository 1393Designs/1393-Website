<?

	session_start();
	include_once('sql.php');

	switch($_POST['action']) {
	
		case 'saveProfile':
			saveProfile($_POST['bio'], $_POST['email']);
			break;
		case 'login':
			login($_POST['email'], $_POST['pass']);
			break;
	
	}
	
function saveProfile($bio, $email) {
	$id = $_SESSION['user_id']; 
	$result = query_update(TABLE_USER, 'bio', $bio, $id);
	$result = query_update(TABLE_USER, 'email', $email, $id);
	echo json_encode(array('response'=>$result));
} // saveProfile

function getUsers() {
	$str = query_select('*', TABLE_USER);
	return $str;
} // getUsers

function getBio($email) {
	$where = "email='$email'";
	$str = query_select_one('*', TABLE_USER, $where);
	$exists = !empty($str);
	echo json_encode(array('response'=>$exists));
} // getBio

function login($email, $pass) {

	$where = "email='$email' AND password='$pass'";
	$str = query_select_one('*', TABLE_USER, $where);
	return !empty($str);

} // login

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
} // ago



?>