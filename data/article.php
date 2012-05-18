<?

	session_start();
	include_once('sql.php');

	if (isset($_POST['action'])) {
	
		switch($_POST['action']) {
		
			case 'createArticle':
				createArticle($_POST['id'], $_POST['title'], $_POST['content']);
				break;
			case 'getArticle':
				getArticle($_POST['id']);
				break;
			case 'saveArticle':
				saveArticle($_POST['id'], $_POST['title'], $_POST['content']);
				break;
			case 'deleteArticle':
				deleteArticle($_POST['id']);
				break;
			case 'loadMore':
				loadMore($_POST['after']);
				break;
		}	
} // switch

/*
*
*/

	function countMessages() {
		$result = query_select_one('COUNT(id)', TABLE_CONTACT, "active='1'");
		return $result['COUNT(id)'];	
	} // countMessages

	function countOldMessages() {
		$result = query_select_one('COUNT(id)', TABLE_CONTACT, "active='0'");
		return $result['COUNT(id)'];	
	} // countOldMessages
	
	function getActiveMessages() {
		$str = '';
		$str = query_select('*', TABLE_CONTACT, 'active="1" ORDER BY DATE DESC');
		return $str;
	} // getMessages
	
	function getOldMessages() {
		$str = '';
		$str = query_select('*', TABLE_CONTACT, 'active="0" ORDER BY DATE DESC');
		return $str;
	} // getMessages

/*
*
*/

function deleteArticle($id) {
	$result = query_delete(TABLE_ARTICLE, $id);
	echo json_encode(array('response'=>$result));	
} // deleteArticle
	
function saveArticle($id, $title, $content) {
	$query = "SET title='$title', content='$content'";
	$result = query_update_specific(TABLE_ARTICLE, $query, $id);
	echo json_encode(array('response'=>$result));
} // saveArticle
	
function getArticle($id) {
		$result = query_select_one('*', TABLE_ARTICLE, "id='$id'");
		echo json_encode(array('title'=>$result['title'], 'content'=>$result['content']));	
} // getArticle

function createArticle($id, $title, $content) {
		$author_array = query_select_one('*', TABLE_USER, "id='$id'");
		$author = $author_array['name'];
		//$clean_title = mysql_real_escape_string($title);
		//$clean_content = mysql_real_escape_string($content);
		$clean_title = $title;
		$clean_content = $content;
		$vals = "'', '$clean_title', '$clean_content', '$author', now()";
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

function getArticlesForBlog() {
	$str = query_select('*', TABLE_ARTICLE, '1 ORDER BY POST_DATE DESC LIMIT 8');
	return $str;
}

function loadMore($date) {
	$results = query_select('*', TABLE_ARTICLE, "post_date > '$date' LIMIT 10");	
	echo json_encode(array('response'=>$results));
} // loadMore
	
	


?>








