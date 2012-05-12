<?

function getBio($id) {
	
	$str = "Shank speck pork loin hamburger turkey tri-tip. Hamburger meatball salami frankfurter. Hamburger beef ribs capicola frankfurter. Beef shankle shank turducken, spare ribs rump frankfurter pancetta pork loin kielbasa.";
	$where = 'id='.$id;
	$str = query_select_one('*', TABLE_USER, $where);
	return $str;
	
} // getBio
	
	function login() {
		$email= grab('email');
		$password= md5(grab('password'));
		
			if ($email != '' && $password != '') {
			$query = "SELECT * from user WHERE email='$email' AND password='$password'";
			$result = mysql_query($query);
			
			if ( mysql_num_rows($result) > 0) {
				$row = mysql_fetch_array($result);
				
				$validated = $row['validated'];
				if (!$validated) {
					echo json_encode(array('waiting'=>'Your account is awaiting approval.<br>You\'ll be notified via email when<br>another user validates your account.'));
				} else {
					$fname = $row['fname'];
					$id = $row['id'];
					$_SESSION['user_id'] = $id;
					$query = "SELECT last_login FROM user WHERE id='$id'";
					$result = mysql_query($query);
					$row = mysql_fetch_array($result);
					$_SESSION['last_login'] = $row['last_login'];
					$_SESSION['username'] = $fname;
					$_SESSION['email'] = $email;
					echo json_encode(array('msg'=>'Welcome back!'));	
				}
			} else {
				echo json_encode(array('error'=>'Unrecognized login.'));	
			}
		} else {
			echo json_encode(array('error'=>'Please fill in your email and password.'));	
		}
	} // end login
	
	function logout() {
		$id = $_SESSION['user_id'];
		$query = "UPDATE user SET last_login=now() WHERE id='$id'";
		mysql_query($query);
		session_destroy();
	} // end logout
	


?>