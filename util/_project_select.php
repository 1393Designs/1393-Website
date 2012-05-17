
<option value="-1" disabled selected>Select project</option>

<?

	$projects = getProjects();
						
	foreach ($projects as $p) {
		$name = $p['name'];
		$id = $p['id'];
	?>
		<option value="<?= $id ?>"><?= $name ?></option>
	<?							
		
	}
						
?>