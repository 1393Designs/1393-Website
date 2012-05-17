<script type="text/javascript">

$(function() {
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
	
	$('#post').click(function() {
		id = $('#user_id').attr('value'); // author
		text = $('#blog').val().trim();
		title = $('#blog_title').val().trim();
		articleOp('createArticle', id, title, text);
	}); // post article
	
	$('#delete_post_bubble').click(function() {
		var c = confirm('Are you sure?');
		if (c) {	
			id = $('#delete_posts_select').attr('value');
			articleOp('deleteArticle', id, null, null, null, null, null);
		}
	}); // delete

	
});

</script>

<div class="tabs">
					<h3 id="newpost_tab" class="tab active_tab">New Blog Post</h3>
					<h3 id="editpost_tab" class="tab">Edit a Post</h3>
					<h3 id="deletepost_tab" class="tab">Delete a Post</h3>
				</div>
		
				<div id="newpost" class="tabbed section">
					<table>
						<tr>
							<td><h5>Title&nbsp;</h5></td>
							<td class="fill_parent">
								<input id="blog_title" class="fill_parent" type="text"placeholder="Title foo" autofocus />
							</td>
						</tr>
					</table>
					<textarea id="blog" placeholder="Content foo" rows="5" cols="60" required></textarea>
					<div id="post" class="op">Post</div>
				</div>	
				
				<div id="editpost" class="tabbed section" style="display:none">
				
					<select name="posts" id="posts">
					<? include('util/_article_select.php'); ?>
					</select>				
					<table>
							<tr>
								<td><h5>Title&nbsp;</h5></td>
								<td class="fill_parent">
									<input class="fill_parent" id="edit_post_title" type="text"placeholder="Title foo"/>
								</td>
							</tr>
					</table>
					<textarea id="edit_post_content" placeholder="Content foo" rows="5" cols="60"></textarea>
					<div id="edit_post_bubble" class="op">Save</div>
				</div>
				
		
			<div id="deletepost" class="tabbed section" style="display:none">
				
					<select id="delete_posts_select" name="posts" class="float_select">
					<? include('util/_article_select.php'); ?>
					</select>
					<div id="delete_post_bubble" class="op">Delete</div>
				</div>
