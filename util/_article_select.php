
<option value="-1" disabled selected>Select post</option>
<?
	$articles = getArticles();
	
	foreach ($articles as $a) {
		$name = $a['title'];
		$id = $a['id'];
		
	?>
		<option value="<?= $id ?>"><?= $name ?></option>
	<?	}  ?>