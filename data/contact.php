<?

	session_start();
	include_once('sql.php');

	if (isset($_POST['action'])) {
	
		switch ($_POST['action']) {
		
			case 'message':
				message($_POST['from_name'], $_POST['from_email'], $_POST['subject'], $_POST['content']);
				break;
			case 'msgCompleted':
				msgCompleted($_POST['id']);
				break;
		}
		
	} // switch
	
	function msgCompleted($id) {
		$result = query_update(TABLE_CONTACT, 'active', '0', $id);
		echo json_encode(array('response'=>$result));
	} // msgCompleted

	function message($from, $email, $subject, $content) {	
	//'', 'asdfasdf', 'asdf@test.com', '', 'asdf', '1', '', now()
		$active = 1;
		$vals = "'', '$from', '$email', '$subject', '$content', '$active', '', now()"; // no responder
		$result = query_insert(TABLE_CONTACT, $vals);
		echo json_encode(array('response'=>$vals));		
	} //message
	
	function getMessages() {
		$str = '';
		//$str = query_select('*', TABLE_CONTACT, '1 ORDER BY DATE DESC');
		return $str;
	} // getMessages
	
?>