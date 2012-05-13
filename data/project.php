<?

	session_start();
	include_once('sql.php');

	switch($_POST['action']) {
	
		case 'createApp':
			createApp($_POST['name'], $_POST['purpose'], $_POST['blurb'], $_POST['details']);
			break;
	}

	function getProjects() {
		$str = query_select('*', TABLE_PROJECT);
		return $str;
	} // getUsers

	function createApp($name, $purpose, $blurb, $details) {
		$vals = "'', '$name', '$purpose', '$blurb', '$details'";
		$result = query_insert(TABLE_PROJECT, $vals);
	
		echo json_encode(array('response'=>$result));	
	} // createApp


?>