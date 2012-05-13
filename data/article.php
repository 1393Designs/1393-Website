<?

	session_start();
	include_once('sql.php');

	switch($_POST['action']) {
	
		case 'createArticle':
			createArticle($_POST['title'], $_POST['content'], 'Kim');
			break;
	}


function createArticle($title, $content, $author) {

		$vals = "'', '$title', '$content', '$author', now()";
		$result = query_insert(TABLE_ARTICLE, $vals);
	
		echo json_encode(array('response'=>$result));
		
} // end createArticle


	function getRecentArticles() {
		
		$str = query_select('*', TABLE_ARTICLE, '1 ORDER BY POST_DATE DESC LIMIT 2');
		return $str;
		
	} // end getRecentArticles
	
	
	function getArticles() {
		
		$str = query_select('*', TABLE_ARTICLE);
		return $str;
		
	} // end getArticles



?>