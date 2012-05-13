
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


	$('#projects').bind('change', function() {
		alert('changed to ' + $(this).attr('value'));
	});
	
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
	}); // post article
	
	$('#save').click(function() {
		text = $('#profile').val().trim();
		
		if (text != '') {
			
			dataString = 'action=saveProfile&bio='+text;
			
			$.ajax({ 
						 type: 'post',
						 dataType: 'json',
						 url: 'data/user.php',
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
	}); // edit profile
	
	$('#create_app').click(function() {
		name = $('#app_name').val().trim();
		purpose = $('#app_purpose').val().trim();
		blurb = $('#app_blurb').val().trim();
		details = $('#app_details').val().trim();
		
		if (name != '' && purpose != '' && blurb != '' && details != '') {
			
			dataString = 'action=createApp&name='+name;
			dataString += '&purpose='+purpose;
			dataString += '&blurb='+blurb;
			dataString += '&details='+details;
			
			$.ajax({ 
						 type: 'post',
						 dataType: 'json',
						 url: 'data/project.php',
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
	}); // create app

});

</script>

	
	<div id="content">
		<div class="op">&laquo;&nbsp;<a href="index.php">Back</a></div>
		<h4 style="margin-top:20px">Admin<span style="float:right">Welcome, $name</span></h4>
		<div class="clearfix"></div>
		
		<div>
		
				<div class="tabs">
					<h3 id="newpost_tab" class="tab active_tab">New Blog Post</h3>
					<h3 id="editpost_tab" class="tab">Edit a Post</h3>
				</div>
		
				<div id="newpost" class="tabbed section">
					<input class="fill_parent" id="blog_title" type="text"placeholder="Title foo" required/><br>
					<textarea id="blog" placeholder="Foo bar" rows="5" cols="60" required></textarea>
					<div id="post" class="op">Post</div>
				</div>	
				
				<div id="editpost" class="tabbed section" style="display:none">
					<input class="fill_parent" id="edit_blog_title" type="text"placeholder="Title foo" required/><br>
					<textarea id="" placeholder="Foo bar" rows="5" cols="60" required></textarea>
					<div id="editpost_bubble" class="op">Save</div>
				</div>
				
		</div>
		<div>
		
				<div class="tabs">
					<h3 id="editprofile_tab" class="active_tab">Profile</h3>
				</div>
				
				<div id="editprofile" class="section">
					<textarea id="profile" placeholder="Profile stuffs" rows="5" cols="60">
					<? echo $bio; ?>
					</textarea>
					<div id="save" class="op">Save</div>
				</div>
		
		</div>
		<div>
		
				<div class="tabs">
					<h3 id="createapp_tab" class="tab active_tab">Add an App</h3>
					<h3 id="editapp_tab" class="tab">Edit an App</h3>
				</div>
				
				<div id="createapp" class="tabbed section">
					<table>
						<tr>
							<td>Name</td>
							<td class="fill_parent"><input class="fill_parent" id="app_name" type="text" placeholder="Name foo" required/></td>
						</tr>
						<tr>
							<td>Purpose</td>
							<td class="fill_parent"><input class="fill_parent" id="app_purpose" type="text" placeholder="To help people do stuff better." required/></td>
						</tr>
						<tr>
							<td>Blurb</td>
							<td class="fill_parent"><input class="fill_parent" id="app_blurb" type="text" placeholder="This app is useful for people who enjoy herping the derp. The app does X, Y, Z and allows the user to click foo in order to bar." required/></td>
						</tr>
					</table>
					<textarea id="app_details" placeholder="More app details" rows="5" cols="60" required></textarea>
					<div id="create_app" class="op">Create</div>
				</div><!-- end .section -->
				
				<div id="editapp" class="tabbed section" style="display:none">
					
					<select name="projects" id="projects">
					<?
						$projects = getProjects();
						
						foreach ($projects as $p) {
							$name = $p['name'];
							$id = $p['id'];
							
						?>
						
							<option value="<? echo $id ?>"><? echo $name ?></option>
						
						<?							
							
						}
					
					?>
					</select>	
				
					<div id="edit_app_space" style="display:none">				
							<table>
								<tr>
									<td>Name</td>
									<td class="fill_parent"><input class="fill_parent" id="app_name" type="text" placeholder="Name foo" required/></td>
								</tr>
								<tr>
									<td>Purpose</td>
									<td class="fill_parent"><input class="fill_parent" id="app_purpose" type="text" placeholder="To help people do stuff better." required/></td>
								</tr>
								<tr>
									<td>Blurb</td>
									<td class="fill_parent"><input class="fill_parent" id="app_blurb" type="text" placeholder="This app is useful for people who enjoy herping the derp. The app does X, Y, Z and allows the user to click foo in order to bar." required/></td>
								</tr>
							</table>
							<textarea id="app_details" placeholder="More app details" rows="5" cols="60" required></textarea>
							<div id="create_app" class="op">Save</div>
					</div> <!-- end #edit_app_space -->
					
				</div>
		
		</div>
		
	</div><!-- end #content -->
			
<? include('include/footer.php'); ?>