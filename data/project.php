<?

function getProjects() {
	$str = query_select('*', TABLE_PROJECT);
	return $str;
} // getUsers

?>