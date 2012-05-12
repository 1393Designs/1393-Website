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


	function getRecentArticles() {
		
		$str = query_select('*', TABLE_ARTICLE, '1 LIMIT 2');
		return $str;
		
	} // end getRecentArticles
	
	
	function getArticles() {
		
		$str = query_select('*', TABLE_ARTICLE);
		return $str;
		
	} // end getArticles
	
	
	
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
	

function getAllArticles() {
	$str = "";
	$articles = queryArticles();
	$str .= formatArticles($articles);
	return $str;
} // end getAllArticles






?>