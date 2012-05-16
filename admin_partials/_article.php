
<div class="tabs">
					<h3 id="newpost_tab" class="tab active_tab">New Blog Post</h3>
					<h3 id="editpost_tab" class="tab">Edit a Post</h3>
					<h3 id="deletepost_tab" class="tab">Delete a Post</h3>
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
							<option value="<?= $id ?>"><?= $name ?></option>
						<?	}  ?>
					</select>				
					<table>
							<tr>
								<td>Title</td>
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
						<option value="-1" disabled selected>Select post</option>
					<?
						$articles = getArticles();
						
						foreach ($articles as $a) {
							$name = $a['title'];
							$id = $a['id'];
							
						?> <option value="<?= $id ?>"><?= $name ?></option>
						
						<?	}  ?>
					</select>
					<div id="delete_post_bubble" class="op">Delete</div>
				</div>