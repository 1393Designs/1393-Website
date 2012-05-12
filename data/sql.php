<?

	include_once('config.php');
	
	function query_select($fields, $table, $where='1') {
	
		db();
		$query = "SELECT $fields FROM $table WHERE $where";
		$result = mysql_query($query) or die(mysql_error());
		$output = array();
		while($row = mysql_fetch_array($result)) {
			$output[] = $row;
		}
		mysql_close();
		return $output;
	} // end query_select
	
	function query_select_one($fields, $table, $where='1') {
	
		db();
		$query = "SELECT $fields FROM $table WHERE $where";
		$result = mysql_query($query) or die(mysql_error());
		$output = '';
		while($row = mysql_fetch_array($result)) {
			$output = $row;
		}
		mysql_close();
		return $output;
	} // end query_select_one

	function query_insert($table, $values) {
		db();
		$query = "INSERT INTO $table VALUES($values)";	
		$result = mysql_query($query) or die(mysql_error());
	
		mysql_close();
		return $query;
	}
	
 
 
 
 ?>