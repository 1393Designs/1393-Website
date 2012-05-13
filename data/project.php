<?

	session_start();
	include_once('sql.php');

	switch($_POST['action']) {
	
		case 'createApp':
			createApp($_POST['name'], $_POST['purpose'], $_POST['blurb'], $_POST['details']);
			break;
		case 'getProject':
			getProject($_POST['id']);
			break;
	}
	
	function getProject($id) {
		$result = query_select_one('*', TABLE_PROJECT, "id='$id'");
		echo json_encode(array('name'=>$result['name'], 
			'purpose'=>$result['purpose'],
			'blurb'=>$result['blurb'],
			'details'=>$result['details']));
	} // getProject

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