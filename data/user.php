<?

	session_start();
	include_once('sql.php');

	switch($_POST['action']) {
	
		case 'saveProfile':
			saveProfile($_POST['id'], $_POST['bio']);
			break;	
		case 'login':
			login($_POST['email'], md5($_POST['pass']));
			break;
	}
	
function login($email, $pass) {
	
	$where = "email='$email' AND password='$pass'";
	$str = query_select_one('*', TABLE_USER, $where);
	
	$result = '';
	$result_code = 0;
	if ($str['password'] == $pass) {
		$result = 'Passwords match';
		$result_code = 1;
		session_start();
		session_register('admin');
		$_SESSION['email'] = $email;
		$_SESSION['username'] = $str['name'];
		$_SESSION['user_id'] = $str['id'];
	} else {
		$result = 'Incorrect password';
		$result_code = 0;
	}
	
	echo json_encode(array('response'=>$result, 'result_code'=>$result_code));	
	
} // login
	
function saveProfile($id, $bio) {
	$result = query_update(TABLE_USER, 'bio', $bio, $id);
	echo json_encode(array('response'=>$result));
} // saveProfile

function getUsers() {
	$str = query_select('*', TABLE_USER);
	return $str;
} // getUsers

function getBio($email) {
	$where = "email='$email'";
	$str = query_select_one('*', TABLE_USER, $where);
	return $str;
} // getBio

function valid_login($email, $pass) {
	if (!getBio($email)) {
		return false;
	}
	
	$where = "email='$email' AND password='$pass'";
	if (!exists('*', TABLE_USER, $where)) {
		return false;
	}
	
	return true;

} // valid_login

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