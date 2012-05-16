<? 

	include('include/header.php'); 
	$users = getUsers();

?>

<script type="text/javascript">

$(function() {

	$('#team_tab').activate();

});

</script>
			
			
	<div id="content">		
			<?
				
				foreach ($users as $u) {
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
					<p><? echo $blurb ?></p>					
				</div>
				
				<?
				
				} // end foreach
				
				?>

	</div><!-- end #content -->
		
			
<? include('include/footer.php'); ?>