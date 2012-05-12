
<? include('include/admin_nav.php'); 

session_start(); // start the admin session
$_SESSION['username'] = 'Kim';
	
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
		title = $('#blog_title').val().trim();
		
		if (text != '' && title != '') {
			
			dataString = 'action=createArticle&content='+text;
			dataString += '&title='+title;
			
			$.ajax({ 
						 type: 'post',
						 dataType: 'json',
						 url: 'data/article.php',
						 data: dataString,
						 success: function(data) {
							alert(data.response);
						}, // end success
						error: function(xhr, textStatus, errorThrown){
							 alert('request failed' +textStatus + '->' + errorThrown);
						}
				}); // end ajax
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
			<input class="long" id="blog_title" type="text"placeholder="Title foo" required/><br>
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
		
		<h3>Add an App</h3>
		<div class="section">
			<input class="long" id="app_name" type="text"placeholder="App name foo" required/><br>
			<input class="long" id="app_purpose" type="text"placeholder="Purpose" required/><br>
			<input class="long" id="app_blurb" type="text"placeholder="Blurb" required/><br>
			<textarea id="app" placeholder="More app details" rows="5" cols="60" required></textarea>
			<div id="create_app" class="op">Create</div>
		</div>
		
		</div><!-- end #content -->
			
<? include('include/footer.php'); ?>