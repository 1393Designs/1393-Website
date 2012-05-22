<?

	//session_start();
	include_once('sql.php');

	switch($_POST['action']) {
	
		case 'createProject':
			createProject($_POST['name'], $_POST['purpose'], $_POST['blurb'], $_POST['details'], $_POST['slug']);
			break;
		case 'getProject':
			getProject($_POST['id']);
			break;
		case 'saveProject':
			saveProject($_POST['id'], $_POST['name'], $_POST['purpose'], $_POST['blurb'], $_POST['details'], $_POST['slug']);
			break;			
		case 'deleteProject':
			deleteProject($_POST['id']);
			break;
	}
	
	function deleteProject($id) {
		$result = query_delete(TABLE_PROJECT, $id);
		echo json_encode(array('response'=>$result));	
	} // deleteProject
	
	function getProject($id) {
		$result = query_select_one('*', TABLE_PROJECT, "id='$id'");
		echo json_encode(array('name'=>stripslashes($result['name']), 
			'purpose'=>stripslashes($result['purpose']),
			'blurb'=>stripslashes($result['blurb']),
			'details'=>stripslashes($result['details']),
			'slug'=>stripslashes($result['slug']),
			'img_path'=>stripslashes($result['img_path'])));
	} // getProject

	function getProjects() {
		$str = query_select('*', TABLE_PROJECT);
		return $str;
	} // getUsers

	function createProject($name, $purpose, $blurb, $details, $slug) {
	/*
		$clean_name = mysql_real_escape_string(stripslashes($name));
		$clean_purpose = mysql_real_escape_string(stripslashes($purpose));
		$clean_blurb = mysql_real_escape_string(stripslashes($blurb));
		$clean_details = mysql_real_escape_string(stripslashes($details));
		$clean_slug = mysql_real_escape_string(stripslashes($slug));*/
	
		//$vals = "'', '$clean_name', '$clean_purpose', '$clean_blurb', '$clean_details', '$slug', ''"; // note no img by default
		$vals = "'', '$name', '$purpose', '$blurb', '$details', '$slug', ''"; // note no img by default
		$result = query_insert(TABLE_PROJECT, $vals);
		echo json_encode(array('response'=>$result));	
	} // createProject

	function saveProject($id, $name, $purpose, $blurb, $details, $slug) {
	/*
		$clean_name = mysql_real_escape_string(stripslashes($name));
		$clean_purpose = mysql_real_escape_string(stripslashes($purpose));
		$clean_blurb = mysql_real_escape_string(stripslashes($blurb));
		$clean_details = mysql_real_escape_string(stripslashes($details));
		$clean_slug = mysql_real_escape_string(stripslashes($slug));
			$query = "SET name='$clean_name', purpose='$clean_purpose', ";
		$query .= "blurb = '$clean_blurb', details='$clean_details', slug='$clean_slug'";
		*/
		
		$query = "SET name='$name', purpose='$purpose', ";
		$query .= "blurb = '$blurb', details='$details', slug='$slug'";
		$result = query_update_specific(TABLE_PROJECT, $query, $id);
		echo json_encode(array('response'=>$result));
	} // saveProject


?>