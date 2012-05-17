<script type="text/javascript">
$(function() {

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
	
	$('#delete_proj_bubble').click(function() {
		id = $('#delete_proj_select').attr('value');
		dataString = 'action=deleteProject&id='+id;
		msg = 'project deletion';
		entity = 'project';
  	action(entity, dataString, msg);
	}); // delete project

});

</script>

				<div class="tabs">
					<h3 id="createapp_tab" class="tab active_tab">Add a Project</h3>
					<h3 id="editapp_tab" class="tab">Edit a Project</h3>
					<h3 id="deleteproj_tab" class="tab">Delete a Project</h3>
				</div>
				
				<div id="createapp" class="tabbed section">
					<table>
						<tr>
							<td><h5>Name</h5></td>
							<td class="fill_parent"><input class="fill_parent" id="app_name" type="text" placeholder="Name foo" required/></td>
						</tr>
						<tr>
							<td><h5>Purpose</h5></td>
							<td class="fill_parent"><input class="fill_parent" id="app_purpose" type="text" placeholder="To help people do... (1 - 2 sentences)"/></td>
						</tr>
						<tr>
							<td><h5>Blurb</h5></td>
							<td class="fill_parent"><input class="fill_parent" id="app_blurb" type="text" placeholder="Useful for people who ... Does X, Y, Z and allows the user to ... (1-2 sentences)"/></td>
						</tr>
						<tr>
							<td><h5>Slug</h5></td>
							<td class="fill_parent"><input class="fill_parent" id="app_slug" type="text" placeholder="If page exists, like proj_name.php (no spaces)"/></td>
						</tr>
					</table>
					<textarea id="app_details" placeholder="More app details" rows="5" cols="60" required></textarea>
					<div id="create_proj_bubble" class="op">Create</div>
				</div><!-- end #createapp -->
				
				<div id="editapp" class="tabbed section" style="display:none">
					
					<select name="projects" id="projects">
					<? include('util/_project_select.php'); ?>
					</select>	
								
						<table>
							<tr>
								<td><h5>Name</h5></td>
								<td class="fill_parent"><input class="fill_parent" id="edit_proj_name" type="text" placeholder="Name foo" required/></td>
							</tr>
							<tr>
								<td><h5>Purpose</h5></td>
								<td class="fill_parent"><input class="fill_parent" id="edit_proj_purpose" type="text" placeholder="Purpose foo" required/></td>
							</tr>
							<tr>
								<td><h5>Blurb</h5></td>
								<td class="fill_parent"><input class="fill_parent" id="edit_proj_blurb" type="text" placeholder="Blurb foo" required/></td>
							</tr>
							<tr>
								<td><h5>Slug</h5></td>
								<td class="fill_parent"><input class="fill_parent" id="edit_proj_slug" type="text" placeholder="If page exists, like proj_name.php (no spaces)"/></td>
							</tr>
						</table>
						<textarea id="edit_proj_details" placeholder="More app details" rows="5" cols="60" required></textarea>
						<div id="save_proj_bubble" class="op">Save</div>
				</div><!-- end #editapp -->
				
				
					<div id="deleteproj" class="tabbed section" style="display:none">
						<select id="delete_proj_select" class="float_select">
						<? include('util/_project_select.php'); ?>
						</select>
						<div id="delete_proj_bubble" class="op">Delete</div>
					</div><!-- end #deleteproj -->