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
						error: function(xhr, textStatus, errorThrown) {
								error('Request failed. ' +textStatus+ ': ' + errorThrown);
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
	}); // end #edit_post_button.click

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
							$('#edit_proj_slug').attr('value', proj.slug);
						}, // end success
						error: function(xhr, textStatus, errorThrown) {
								error('Failed to get project. ' +textStatus+ ': ' + errorThrown);
						}
				}); // end ajax
			}
	}); // #projects onchange
	
	$('#post').click(function() {
		id = $('#user_id').attr('value'); // author
		text = $('#blog').val().trim();
		title = $('#blog_title').val().trim();
		articleOp('createArticle', id, title, text);
	}); // post article
	
	$('#save_profile_bubble').click(function() {
		text = $('#profile').val().trim();
		user_blurb = $('#user_blurb').val().trim();
		profileOp('saveProfile', text, user_blurb);
	}); // edit profile
	
	$('#add_role_bubble').click(function() {
	
		
	
	}); // add role
	
	$('#save_proj_bubble').click(function() {
			id = $('#projects').attr('value');
			name = $('#edit_proj_name').attr('value').trim();
			purpose = $('#edit_proj_purpose').attr('value').trim();
			blurb = $('#edit_proj_blurb').attr('value').trim();
			details = $('#edit_proj_details').attr('value').trim();
			slug = $('#edit_proj_slug').attr('value').trim();
			projectOp('saveProject', id, name, purpose, blurb, details, slug);	
	});
	
	$('#create_proj_bubble').click(function() {
			id = '0'; // projectOp requires this
			name = $('#app_name').val().trim();
			purpose = $('#app_purpose').val().trim();
			blurb = $('#app_blurb').val().trim();
			details = $('#app_details').val().trim();
			slug = $('#app_slug').val().trim();
			projectOp('createProject', id, name, purpose, blurb, details, slug);	
	}); // create project
	
	$('#delete_post_bubble').click(function() {
		var c = confirm('Are you sure?');
		if (c) {	
			id = $('#delete_posts_select').attr('value');
			articleOp('deleteArticle', id, null, null, null, null, null);
		}
	}); // delete

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