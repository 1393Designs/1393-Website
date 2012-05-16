<?

	session_start();
	include_once('sql.php');

	switch($_POST['action']) {
	
		case 'saveProfile':
			saveProfile($_POST['id'], $_POST['bio'], $_POST['blurb']);
			break;	
		case 'login':
			login($_POST['email'], md5($_POST['pass']));
			break;
		case 'getProfile':
			getProfile($_POST['id']);
			break;
		case 'getRoles':
			getRoles($_POST['id']);
			break;
	}
	
function getRoles($id) {

	$fields = TABLE_MAP_PROJECT_USER.".id, ".TABLE_PROJECT.".name, ".TABLE_PROJECT.".id";
	$where = TABLE_MAP_PROJECT_USER.".user_id='$id' AND ".TABLE_PROJECT;
	$where.= ".id = ".TABLE_MAP_PROJECT_USER.".project_id";
	$from = TABLE_USER.", ".TABLE_MAP_PROJECT_USER.", ".TABLE_PROJECT;
	$result = query_select($fields, $from, $where);	
	
	echo "<p>".$where."</p>";
	
	return $result;
} // getRoles
	
function getProfile($id) {
	$where = "id='$id'";
	$result = query_select_one('*', TABLE_USER, $where);
	echo json_encode(array(
			'bio'=>stripslashes($result['bio']),
			'blurb'=>stripslashes($result['blurb']),
			'slug'=>stripslashes($result['slug']),
			'img_path'=>stripslashes($result['img_path'])));
} // getProfile
	
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
	
function saveProfile($id, $bio, $blurb) {
	$result = query_update(TABLE_USER, 'bio', $bio, $id);
	$result = query_update(TABLE_USER, 'blurb', $blurb, $id);
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



?>