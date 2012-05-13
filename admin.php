
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
	notification = $('#notification');
	
	$('#posts').bind('change', function() {
		id = $(this).attr('value');
		if (id != -1) {
			dataString = 'action=getArticle&id='+id;
				
			$.ajax({
						 type: 'post',
						 dataType: 'json',
						 url: 'data/article.php',
						 data: dataString,
						 success: function(post) {
							$('#edit_post_title').attr('value', post.title);
							$('#edit_post_content').attr('value', post.content);
						}, // end success
						error: function(xhr, textStatus, errorThrown){
							 alert('request failed' +textStatus + '->' + errorThrown);
						}
				}); // end ajax
			}
		
	}); // #posts.bind(change...)
	
	$('#edit_post_bubble').click(function() {
		id = $('#posts').attr('value');		
		if (id != -1) {
			title = $('#edit_post_title').val().trim();
			text = $('#edit_post_content').val().trim();
			articleOp('saveArticle', id, title, text);
		}					
	}); // end #edit_post_button.click()

	$('#projects').bind('change', function() {
		id = $(this).attr('value');
		if (id != -1) {
		dataString = 'action=getProject&id='+id;
				
			$.ajax({
						 type: 'post',
						 dataType: 'json',
						 url: 'data/project.php',
						 data: dataString,
						 success: function(proj) {
							$('#edit_proj_name').attr('value', proj.name);
							$('#edit_proj_purpose').attr('value', proj.purpose);
							$('#edit_proj_blurb').attr('value', proj.blurb);
							$('#edit_proj_details').attr('value', proj.details);
						}, // end success
						error: function(xhr, textStatus, errorThrown){
							 alert('request failed' +textStatus + '->' + errorThrown);
						}
				}); // end ajax
			}
	}); // #projects onchange
	
	$('#post').click(function() {
		id = '0'; // articleOp requires this parameter, but we don't have it yet
		text = $('#blog').val().trim();
		title = $('#blog_title').val().trim();
		articleOp('createArticle', id, title, text);
	}); // post article
	
	$('#save_profile_bubble').click(function() {
		text = $('#profile').val().trim();
		profileOp(text);
	}); // edit profile
	
	$('#save_proj_bubble').click(function() {
			name = $('#edit_proj_name').val().trim();
			purpose = $('#edit_proj_purpose').val().trim();
			blurb = $('#edit_proj_blurb').val().trim();
			details = $('#edit_proj_details').val().trim();
			appOp('saveProject', name, purpose, blurb, details);	
	});
	
	$('#create_app_bubble').click(function() {
			name = $('#app_name').val().trim();
			purpose = $('#app_purpose').val().trim();
			blurb = $('#app_blurb').val().trim();
			details = $('#app_details').val().trim();
			appOp('createProject', name, purpose, blurb, details);	
	}); // create app

}); // $(function

function finish(data, op) {

	if (data.result_code==0) {
		msg = 'Error with ' +op;
		type = 'error';
	} else {
		msg = 'Successful ' +op;
		type = 'success';
	}
	
	$('#notification').text(msg)
							.removeClass('error').removeClass('success')
							.addClass(type)
							.fadeTo('slow', 1, function() {
								$(this).delay(1400).fadeTo('slow', 0);
							});
} // finish

function appOp(action, name, purpose, blurb, details) {
	
		if (name != '' && purpose != '' && blurb != '' && details != '') {
			
			dataString = 'action='+action+'&name='+name;
			dataString += '&purpose='+purpose;
			dataString += '&blurb='+blurb;
			dataString += '&details='+details;
			
			msg = 'project creation';
			if (action == 'saveProject') msg = 'project update';
			
			$.ajax({ 
						 type: 'post',
						 dataType: 'json',
						 url: 'data/project.php',
						 data: dataString,
						 success: function(data) {
						 	finish(data, msg);
						}, // end success
						error: function(xhr, textStatus, errorThrown){
							 alert('request failed' +textStatus + '->' + errorThrown);
						}
				}); // end ajax
		} else {
			alert('Project missing fields.');
		}
}; // appOp

function profileOp(text) {
	if (text != '') {
				
				dataString = 'action=saveProfile&bio='+text;
				
				$.ajax({ 
							 type: 'post',
							 dataType: 'json',
							 url: 'data/user.php',
							 data: dataString,
							 success: function(data) {
								 	finish(data, 'profile update');
							}, // end success
							error: function(xhr, textStatus, errorThrown){
								 alert('request failed' +textStatus + '->' + errorThrown);
							}
					}); // end ajax
			} else {
				alert('Can\'t save blank profile.');
			}
}; // profileOp

function articleOp(action, id, title, content) {
		if (action=='createArticle') op = 'post creation';
		else if (action=='saveArticle') op = 'post update';

		if (text != '' && title != '') {
					
					dataString = 'action='+action+'&content='+text;
					dataString += '&title='+title;
					dataString += '&id='+id;
					
					$.ajax({ 
								 type: 'post',
								 dataType: 'json',
								 url: 'data/article.php',
								 data: dataString,
								 success: function(data) {
								 	finish(data, op);
								}, // end success
								error: function(xhr, textStatus, errorThrown){
									 alert('request failed' +textStatus + '->' + errorThrown);
								}
						}); // end ajax
				} else {
					alert('Missing blog post fields.');
				}
}; // articleOp

</script>

	<div id="content">
	
		<div class="op">&laquo;&nbsp;<a href="index.php">Back</a></div>
		<h4 style="margin-top:20px">Admin<span style="float:right">Welcome, $name</span></h4>
		<div class="clearfix"></div>
	
		<div id="notification">adsf</div>
		
		<div>
		
				<div class="tabs">
					<h3 id="newpost_tab" class="tab active_tab">New Blog Post</h3>
					<h3 id="editpost_tab" class="tab">Edit a Post</h3>
				</div>
		
				<div id="newpost" class="tabbed section">
					<table>
						<tr>
							<td>Title</td>
							<td class="fill_parent">
								<input class="fill_parent" id="blog_title" type="text"placeholder="Title foo" required/>
							</td>
						</tr>
					</table>
					<textarea id="blog" placeholder="Content foo" rows="5" cols="60" required></textarea>
					<div id="post" class="op">Post</div>
				</div>	
				
				<div id="editpost" class="tabbed section" style="display:none">
				
					<select name="posts" id="posts">
						<option value="-1" disabled selected>Select post</option>
					<?
						$articles = getArticles();
						
						foreach ($articles as $a) {
							$name = $a['title'];
							$id = $a['id'];
							
						?>
							<option value="<? echo $id ?>"><? echo $name ?></option>
						
						<?							
							
						}
					
					?>
					</select>				
					<table>
							<tr>
								<td>Title</td>
								<td class="fill_parent">
									<input class="fill_parent" id="edit_post_title" type="text"placeholder="Title foo" required/>
								</td>
							</tr>
					</table>
					<textarea id="edit_post_content" placeholder="Content foo" rows="5" cols="60" required></textarea>
					<div id="edit_post_bubble" class="op">Save</div>
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
					<div id="save_profile_bubble" class="op">Save</div>
				</div>
		
		</div>
		<div>
		
				<div class="tabs">
					<h3 id="createapp_tab" class="tab active_tab">Add a Project</h3>
					<h3 id="editapp_tab" class="tab">Edit a Project</h3>
				</div>
				
				<div id="createapp" class="tabbed section">
					<table>
						<tr>
							<td>Name</td>
							<td class="fill_parent"><input class="fill_parent" id="app_name" type="text" placeholder="Name foo" required/></td>
						</tr>
						<tr>
							<td>Purpose</td>
							<td class="fill_parent"><input class="fill_parent" id="app_purpose" type="text" placeholder="To help people do... (1 - 2 sentences)" required/></td>
						</tr>
						<tr>
							<td>Blurb</td>
							<td class="fill_parent"><input class="fill_parent" id="app_blurb" type="text" placeholder="Useful for people who ... Does X, Y, Z and allows the user to ... (1-2 sentences)" required/></td>
						</tr>
					</table>
					<textarea id="app_details" placeholder="More app details" rows="5" cols="60" required></textarea>
					<div id="create_app_bubble" class="op">Create</div>
				</div><!-- end .section -->
				
				<div id="editapp" class="tabbed section" style="display:none">
					
					<select name="projects" id="projects">
						<option value="-1" disabled selected>Select project</option>
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
								
						<table>
							<tr>
								<td>Name</td>
								<td class="fill_parent"><input class="fill_parent" id="edit_proj_name" type="text" placeholder="Name foo" required/></td>
							</tr>
							<tr>
								<td>Purpose</td>
								<td class="fill_parent"><input class="fill_parent" id="edit_proj_purpose" type="text" placeholder="Purpose foo" required/></td>
							</tr>
							<tr>
								<td>Blurb</td>
								<td class="fill_parent"><input class="fill_parent" id="edit_proj_blurb" type="text" placeholder="Blurb foo" required/></td>
							</tr>
						</table>
						<textarea id="edit_proj_details" placeholder="More app details" rows="5" cols="60" required></textarea>
						<div id="save_proj_bubble" class="op">Save</div>
					
				</div>
		
		</div>
		
	</div><!-- end #content -->
			
<? include('include/footer.php'); ?>