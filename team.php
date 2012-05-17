<? 

	include('include/header.php'); 
	$users = getUsers();

?>

<script type="text/javascript">

$(function() {

	$('#team_tab').activate();

});

</script>
					
			<?
				
				foreach ($users as $u) {
					$id = $u['id'];
					$name = $u['name'];
					$bio = htmlspecialchars($u['bio']);
					$email = $u['email'];
					$blurb = $u['blurb'];
					$slug = $u['slug'];
					$img_path = $u['img_path'];
				
				?>
					<div class="bio">
						<div class="bio_img">
							<? if (!empty($slug)) {
								 echo "<a href='$slug'>$name</a>";
								} else {
									echo "$name";
								} ?>
						</div>
					<p><? 
					
						if (!empty($blurb)) {
							echo $blurb;
						} else {
							$str = 'Oops! This section needs to be filled out by '.$name.' :s ';
							echo $str;
						}
						
						?></p>
						
					<p><? 
					
						$user_roles = getRoles($id);
					
						include('util/_user_roles.php');
						
						if (!empty($roles)) {
							echo "<br><h5>Projects worked on:</h5>";
							echo $roles;
						}						
						
					?></p>
				</div>
				
				<?
				
				} // end foreach
				
				?>
		
			
<? include('include/footer.php'); ?>