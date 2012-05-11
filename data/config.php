<?

	define("DB_HOST", "localhost");
	define("DB_USER", "root");
	define("DB_PASS", "");
	define("DB_DATABASE", "1393");
	
	define("TABLE_USER", "user");
	define("TABLE_ITEM", "item");
	define("TABLE_LIST", "list");
	define("TABLE_LIST_USER", "map_list_user");
	define("TABLE_DEVICE", "device");
	
function dbConn() { // connect with MySQLI (OOP)

	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE); 
	return $mysqli;

}

function db() { // connect with MySQL

  mysql_connect(DB_HOST, DB_USER, DB_PASS) or die('Error connecting to mysql'.mysql_error());
	mysql_selectdb(DB_DATABASE) or die('->>Error selecting database'.mysql_error());
}

?>