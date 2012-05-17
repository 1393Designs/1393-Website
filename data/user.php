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
		case 'newRole':
			newRole($_POST['user_id'], $_POST['proj_id'], $_POST['role']);
			break;
		case 'updateRole':
			updateRole($_POST['map_id'], $_POST['role']);
			break;
		case 'deleteRole':
			deleteRole($_POST['map_id']);
			break;
	}
	
function deleteRole($map_id) {
	$result = query_delete(TABLE_MAP_PROJECT_USER, $map_id);
	echo json_encode(array('response'=>$result));
} // deleteRole
	
function updateRole($map_id, $role) {
	$result = query_update(TABLE_MAP_PROJECT_USER, 'role', $role, $map_id);
	echo json_encode(array('response'=>$result));
} // roleUpdate
	
function newRole($user_id, $proj_id, $role) {
	$vals = "'', '$proj_id', '$user_id', '$role'";
	$result = query_insert(TABLE_MAP_PROJECT_USER, $vals);
	echo json_encode(array('response'=>$result));
} // newRole
	
function getRoles($id) {

	$map = TABLE_MAP_PROJECT_USER;
	$project = TABLE_PROJECT;

	$fields = "$map.id, $map.role, $project.name, $map.project_id";
	$where = "$map.user_id='$id' AND $project.id = $map.project_id";
	$from = $map.", ".$project;
	$result = query_select($fields, $from, $where);
	
	return $result;
} // getRoles
	
function getProfile($id) {
	$where = "id='$id'";
	$result = query_select_one('*', TABLE_USER, $where);
	echo json_encode(array(
			'name'=>stripslashes($result['name']),
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