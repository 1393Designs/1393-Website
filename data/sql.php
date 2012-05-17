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
	
	function exists($fields, $table, $where='1') {
		db();
		$query = "SELECT $fields FROM $table WHERE $where";
		$result = mysql_query($query) or die(mysql_error());
		$output = mysql_num_rows($result);
		mysql_close();
		return $output;
	} // end exists

	function query_insert($table, $values) {
		db();
		$clean = $values;
		$query = "INSERT INTO $table VALUES($clean)";	
		$result = mysql_query($query) or die(mysql_error());
		mysql_close();
		return $query;
	}
	
	function query_update($table, $field, $content, $id) {
		db();
		$clean_field = $field;
		$clean_content = $content;
		$query = "UPDATE $table SET $clean_field = '$clean_content' WHERE id='$id'";	
		$result = mysql_query($query) or die(mysql_error());
		mysql_close();
		return $result;
	}
	
	function query_update_specific($table, $changes, $id) {
		db();
		$query = "UPDATE $table $changes WHERE id='$id'";	
		$result = mysql_query($query) or die(mysql_error());
		mysql_close();
		return $result;
	} // query_update_specific
	
	function query_delete($table, $id) {
			db();
			$query = "DELETE FROM $table WHERE id='$id'";
			$result = mysql_query($query) or die(mysql_error());
			mysql_close();
			return $result;
	} // query_delete
 
 
 ?>
 
 
 
 
 
 
 
 