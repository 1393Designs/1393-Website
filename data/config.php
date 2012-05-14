<?
		
	include_once('sql.php');
	include_once('article.php');
	include_once('project.php');
	include_once('user.php');

	define("DB_HOST", "localhost");
	define("DB_USER", "root");
	define("DB_PASS", "");
	define("DB_DATABASE", "1393_site");
	
	define("TABLE_USER", "user");
	define("TABLE_ARTICLE", "article");
	define("TABLE_PROJECT", "project");

	function db() { // connect with MySQL
		mysql_connect(DB_HOST, DB_USER, DB_PASS) or die('Error connecting to mysql'.mysql_error());
		mysql_selectdb(DB_DATABASE) or die('Error selecting database'.mysql_error());
	}
	
?>