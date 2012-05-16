<? 

	include('include/header.php'); 
	$users = getUsers();

?>

<script type="text/javascript">

$(function() {

	$('#team_tab').activate();

});

</script>
			
			
	<div id="content">		<?
				
				foreach ($users as $u) {
					$name = $u['name'];
					$bio = $u['bio'];
					$email = $u['email'];
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
					<p><? echo htmlentities($bio) ?></p>					
				</div>
				
				<?
				
				} // end foreach
				
				?>

	</div><!-- end #content -->
		
			
<? include('include/footer.php'); ?>