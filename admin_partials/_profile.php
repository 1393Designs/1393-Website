<script>

$(function() {
	
	$('#save_profile_bubble').click(function() {
		text = $('#profile').val().trim();
		user_blurb = $('#user_blurb').val().trim();
		profileOp('saveProfile', text, user_blurb);
	}); // edit profile

	$('#new_role_bubble').click(function() {
		proj_id = $('#roles_select').attr('value');
		user_id = $('#user_id').attr('value');
		if (proj_id != -1) { // user has selected a project
				role = $('#new_proj_role').attr('value').trim();
				dataString = 'action=newRole&role='+role+'&proj_id='+proj_id+'&user_id='+user_id;
				successMsg = 'role creation';
				mapOp(dataString, successMsg);
		} else {
			error('No project selected');
		}
	}); // #new_role_bubble
	
	$('.role').bind('change', function() {
		map_id = $(this).siblings('.map_id').attr('value');
		role = $(this).attr('value').trim();
		proj = $(this).siblings('.proj_name').attr('value');
		dataString = 'action=updateRole'+'&map_id='+map_id+'&role='+role;
		successMsg = 'project role update ('+proj+')';
		if (role != '') {
			mapOp(dataString, successMsg);		
		} else {
			error('Role must not be empty');
		}
	}); // $(.role).bind
	
	$('.delete').click(function() {
		map_id_arr = $(this).attr('id').split('_');
		map_id = map_id_arr[1];
		dataString = 'action=deleteRole'+'&map_id='+map_id;
		successMsg = 'project role deletion';
		mapOp(dataString, successMsg);
	}); // $('.delete').click
	
});

</script>


				<div class="tabs">
					<h3 id="editprofile_tab" class="tab active_tab">Edit Profile</h3>
					<h3 id="userproject_tab" class="tab">Projects Worked On</h3>
				</div>
				
				<div id="editprofile" class="tabbed section">
					<table>
						<tr>
							<td>Blurb&nbsp;</td>
							<td class="fill_parent"><input id="user_blurb" value="<?= $user_blurb ?>" class="fill_parent" type="text" placeholder="Education/current position, interesting personal fact :)" /></td>
						</tr>
					</table>
					<textarea id="profile" placeholder="More detailed profile (HTML chars allowed)" class="text"><?= $bio ?></textarea>					
					<div id="save_profile_bubble" class="op">Save</div>
				</div><!-- end #editprofile -->
				
				
				<div id="userproject" class="tabbed section" style="display:none">
					<div id="existing_roles" class="roles_projects">
					
					<h5>Past/current projects</h5>
					<?
						$roles = getRoles($_SESSION['user_id']);
						
						if (!empty($roles)) {
						
							?>
								<table>
							<?
							$counter = 0;
							foreach ($roles as $r) {
								$map_id = $r['id'];
								$proj_name = $r['name'];
								$proj_role = $r['role'];
								
								?>
									<tr>
										<td><?= $proj_name ?></td>
										<td>
												<input class="proj_name" value="<?= $proj_name ?>" type="hidden"/>
												<input class="map_id" value="<?= $map_id ?>" type="hidden"/>
												<input class="role" value="<?= $proj_role ?>" type="text"/>
										</td>
										<td>
											<div id="delete_<?= $map_id ?>" class="delete">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
										</td>
									</tr>
								<?
								$counter++;	
								} // foreach
							?>
							</table>
							<?	} else {  
								echo "(None)";
								}
							?>
					</div> <!-- end #existing_roles -->
					
					
					
				<div id="new_role" class="roles_projects">
					<div id="new_role_bubble" class="op">Add Role</div>
					<h5>Add yourself to a project</h5>			
					<select name="projects" id="roles_select">
						<? include('util/_project_select.php');	?>
					</select>
					<input id="new_proj_role" type="text" placeholder="What was your role?"/>	
				</div><!-- end #new_role -->		
				
		</div><!-- end #userproject -->