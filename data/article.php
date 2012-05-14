<?

	session_start();
	include_once('sql.php');

	switch($_POST['action']) {
	
		case 'createArticle':
			createArticle($_POST['title'], $_POST['content'], 'Kim');
			break;
		case 'getArticle':
			getArticle($_POST['id']);
			break;
		case 'saveArticle':
			saveArticle($_POST['id'], $_POST['title'], $_POST['content']);
			break;
	}
	
function saveArticle($id, $title, $content) {
	$query = "SET title='$title', content='$content'";
	$result = query_update_specific(TABLE_ARTICLE, $query, $id);
	echo json_encode(array('response'=>$result));
}
	
function getArticle($id) {
		$result = query_select_one('*', TABLE_ARTICLE, "id='$id'");
		echo json_encode(array('title'=>$result['title'], 'content'=>$result['content']));	
} // getArticle

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
		$str = query_select('*', TABLE_ARTICLE, '1 ORDER BY POST_DATE DESC');
		return $str;
	} // end getArticles



?>