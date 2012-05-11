<?

if (isset($_POST['action']) && !empty($_POST['action']) ){
		$action = $_POST['action'];
		$action = htmlspecialchars(trim($action));
		switch($action) {
			case 'createArticle':
				createArticle();
				break;
			case 'searchBlog':
				formatSearchResults($_POST['criteria']);
				break;
			}
	}
	

?>