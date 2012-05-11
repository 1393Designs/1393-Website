<?


function createArticle() {

	$title= $_POST['title'];
	$content= stripslashes($_POST['content']);
	$tags = $_POST['tags'];
	$userTags = $_POST['userTags'];
	
	if ($title!='' && $content!='') {
	
		$user_id = $_SESSION['user_id'];
		$query = "INSERT INTO article(title, user_id, content, post_date) VALUES('$title','$user_id','$content',now())";
		$result = mysql_query($query);
		
		$articleID = mysql_insert_id();
		tagArticle($tags, $articleID);
		userTagArticle($userTags, $articleID);
		
		if ($result) {
			echo json_encode(array('msg'=>'Your post was added!'));	
		} else {
			echo json_encode(array('error'=>'error'));	
		}
	} else {
		echo json_encode(array('error'=>'Please enter all fields.'));
	}
} // end createArticle

function formatArticles($articles) {
	$str = "";
	foreach ($articles as $a) {
		$str .= "<div class='article'>";
		$str .= "<input type='hidden' class='article_id' value='".$a['id']."'>";
		
		$str .= "<h3>".$a['title']."</h3>";
		$str .= "<span class='author'>by ".getUsername($a['user_id'])."</span>";
		$str .= "<span class='memberTimestamp'>".toDateWithAgo($a['post_date'])."</span><br>";
		$str .= "<span class='article_content'>".$a['content']."</span>";
		$str .= "<div class='tags'>";
		//$str .= formatUserTagsForArticle($a['id']);		
		//$str .= formatTagsForArticle($a['id']);
		$str .= "</div>"; // end div.tags
		//$str .= formatCommentsForArticle($a['id']);
		
		$str .= "</div>";
	}//end foreach
	return $str;
} // end formatArticles


function getAllArticles() {
	$str = "";
	$articles = queryArticles();
	$str .= formatArticles($articles);
	return $str;
} // end getAllArticles



function queryArticles() {
	$query = "SELECT * FROM article WHERE article.active='1' ORDER BY post_date DESC";
	$result = mysql_query($query) or die(mysql_error());
	$articles = array();
	while($row = mysql_fetch_array($result)){
			$articles[] = $row;
		}
	return $articles;
} // end queryArticles


	
	function toDate($date){
		$r = strtotime($date);
		
		return ago($r);
	}	
	
	function toDatetime($date) {
		$d = new DateTime($date);
		$d = $d->format('D, m-d-Y @ g:i a');
		return $d;
	}
	
	function toDateWithAgo($date, $fullyear=null) {
		$d = new DateTime($date);
		if ($fullyear == 'fullyear') $d = $d->format('D, m-d-Y');
		else  $d = $d->format('D, m-d-y');
		$r = strtotime($date);
		
		return ago($r)." on $d";
	} // end toDateWithAgo


?>