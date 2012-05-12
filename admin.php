
<? include('include/admin_nav.php'); 

session_start(); // start the admin session

$do = $_GET['do'];
if ($do == 'logout') {
	session_destroy(); 						//end admin session (effectively log out)
	header('location:index.php'); // and return to index/main
} 

if (!session_is_registered('admin')) { //If session not registered as admin
	header('location:index.php'); 			// then redirect to homepage.
} else { 															//else continue to admin page
	header('Content-Type: text/html; charset=utf-8');
}

	
	$profile = getBio(1);
	$bio = $profile['bio'];
	$name = $profile['name'];
	$email = $profile['email'];
	//$profile = getBio($_SESSION['id']);

?>

<script type="text/javascript">

$(function() {
	
	$('#post').click(function() {
		text = $('#blog').val().trim();
		
		if (text != '') {
			alert('posting: '+text);
		} else {
			alert('blank');
		}
		
		
	});
	
	$('#save').click(function() {
		text = $('#profile').val().trim();
		
		if (text != '') {
			alert('saving profile: '+text);
		} else {
			alert('blank');
		}
	});

});

</script>

	
	<div id="content">
		<div class="op">&laquo;&nbsp;<a href="index.php">Back</a></div>
		<h4 style="margin-top:20px">Admin<span style="float:right">Welcome, $name</span></h4>
		
		<div class="clearfix"></div>
		
		<h3>New Blog Post</h3>
		<div class="section">
			<input id="blog_title" type="text"placeholder="Title foo" required/><br>
			<textarea id="blog" placeholder="Foo bar" rows="5" cols="60" required></textarea>
			<div id="post" class="op">Post</div>
		</div>	
		
		<h3>Edit Your Profile</h3>
		<div class="section">
			<textarea id="profile" placeholder="Profile stuffs" rows="5" cols="60">
			<? echo $bio; ?>
			</textarea>
			<div id="save" class="op">Save</div>
		</div>
		
		</div><!-- end #content -->
			
<? include('include/footer.php'); ?>