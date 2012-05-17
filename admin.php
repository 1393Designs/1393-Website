<? 

	include('include/admin_header.php');
	$email = $_SESSION['email'];
	$name = $_SESSION['username'];
	$id = $_SESSION['user_id'];
	
	$profile = getBio($email);
	$bio = $profile['bio'];
	$user_blurb = $profile['blurb'];
	
?>

<script type="text/javascript">

$(function() {
	

}); // $(function

</script>

	<div id="content">
	
		<input id="user_id" type="hidden" value="<?= $_SESSION[user_id] ?>"/>
	
		<div class="op"><a href="index.php">&laquo;&nbsp;Home</a></div>
		<div class="op"><a href="blog.php">Blog</a></div>
		<div class="op"><a href="team.php">Team</a></div>
		<div class="op"><a href="projects.php">Projects</a></div>
		<div class="op"><a href="contact.php">Contact</a></div>
		<h4 style="margin-top:1em;text-align: right; float:right">
			Welcome, <?= $name ?>
			<a href="index.php?do=logout">[Logout]</a>
		</h4>
		<div class="clearfix"></div>
		<div id="notification"></div>
		
		<div>
		
				<? /*
						* Load the content from partials for better visibility/clarity.
						*/
				
				include('admin_partials/_article.php'); ?>
				
		</div>
		<div>	
		
			<? include('admin_partials/_profile.php'); ?>
		
		</div>
		<div>
		
			<? include('admin_partials/_project.php'); ?>
		
		</div>
			
<? include('include/footer.php'); ?>