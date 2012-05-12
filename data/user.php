<?

function getUsers() {
	$str = query_select('*', TABLE_USER);
	return $str;
} // getUsers

function getBio($id) {
	
	$where = 'id='.$id;
	$str = query_select_one('*', TABLE_USER, $where);
	return $str;
	
} // getBio

?>