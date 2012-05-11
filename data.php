<?

include 'config.php'; // db connection, returns $mysqli

if (!empty($_POST['pass'])) { // if user has posted a password, test it against db password
	$p = $_POST['pass'];
	$query = "SELECT * FROM user WHERE admin=1";
	$result = $mysqli->query($query);
	$row = $result->fetch_row();
	
 	if (md5($p)==$row[2]) { // $row[1] is ID, $row[2] is md5(password)
 		session_register('admin'); // if passwords match, begin admin session
		$msg = 'true';
 	} else {
		$msg = 'false';
 	}

	echo json_encode(array('msg'=>$msg)); // $.ajax catches this response and reacts
	$result->close(); 			// close result set
	$mysqli->close();				// and close db
}

?>