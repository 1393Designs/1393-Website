<script>

$(function() {

	$('#save_roles_bubble').bind('change', function() {
		id = $(this).attr('value');
		if (id != -1) { // user has selected a project
				role = $('#new_proj_role').attr('value').trim();
	//				profileOp(id, role);
			
		} else {
			// user has not selected a project
		}
	});

});

</script>

<style>
	h5 {
		margin: 2px 0;
	}
	
	#save_roles_bubble {
		margin-top: -55px;
	}
	
	.text {
		min-height: 10px;
		height: auto;
	}
	
</style>


				<div class="tabs">
					<h3 id="editprofile_tab" class="tab">Edit Profile</h3>
					<h3 id="userproject_tab" class="tab active_tab">Projects Worked On</h3>
				</div>
				
				<div id="editprofile" class="tabbed section" style="display:none">
					<table>
						<tr>
							<td>Blurb&nbsp;</td>
							<td class="fill_parent"><input id="user_blurb" value="<?= $user_blurb ?>" class="fill_parent" type="text" placeholder="Education/current position, interesting personal fact :)" /></td>
						</tr>
					</table>
					<textarea id="profile" placeholder="More detailed profile (HTML chars allowed)" class="text"><?= $bio ?></textarea>					
					<div id="save_profile_bubble" class="op">Save</div>
				</div><!-- end #editprofile -->
				
				
				<div id="userproject" class="tabbed section">
					
					<h5>Projects you've worked on</h5>
				
					<?
						$roles = getRoles($_SESSION['user_id']);
						
						if (!empty($roles)) {
						
							?>
								<table>
							<?
							$counter = 0;
							foreach ($roles as $r) {
								$proj_name = $r['name'];
								$proj_id = $r['id'];
								$proj_role = $r['role'];
								
								?>
									<tr>
										<td><?= $proj_name ?></td>
										<td><input id="role_<?= $counter ?>" value="role_<?= $counter ?>" type="hidden"/>
												<input id="" class="role" value="<?= $proj_role ?>" type="text"/>
										</td>
									</tr>
								<?
								$counter++;	
							} // foreach
							?>
							</table>
							<?
						}
					
					?>
					<br><br>
					<div id="new_role">
					
						<h5>Add yourself to a project</h5>
						<div class="text">
					
							<select name="projects" id="roles_select">
								<option value="-1" disabled selected>Select project</option>
								<?
							
								$projects = getProjects();
								
								foreach ($projects as $p) {
									$name = $p['name'];
									$id = $p['id'];
								?>
									<option value="<?= $id ?>"><?= $name ?></option>
								<?							
									
								}
							
								?>
							</select>
						
							<input id="new_proj_role" type="text" placeholder="What was your role?"/>
					</div><!-- end .text -->
					
					<div id="save_roles_bubble" class="op">Save</div>
						
					</div><!-- end #new_role -->
					
				</div><!-- end #userproject -->