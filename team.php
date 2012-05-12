
<? include('include/nav.php'); 

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
				
				?>
					<div class="bio">
					<div class="bio_img"><? echo $name ?></div>
					<p><? echo $bio ?></p>					
				</div>
				
				<?
				
				} // end foreach
				
				?>

	</div><!-- end #content -->
		
			
<? include('include/footer.php'); ?>