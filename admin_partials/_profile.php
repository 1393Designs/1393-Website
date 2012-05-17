<script>

$(function() {

	$('#save_roles_bubble').click(function() {
		id = $('#roles_select').attr('value');
		if (id != -1) { // user has selected a project
				role = $('#new_proj_role').attr('value').trim();
				mapOp('newRole', role, id);
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
	
	.section.op {
		float: right;
	}
	
	#save_roles_bubble {
		margin-top: 0;
		float: right;
	}
	
	.text {
		min-height: 10px;
		height: auto;
	}
	
	#new_role {
		border-left: 2px solid #57527E;
		padding: 0 30px 0 15px;
	}
	
	.roles_projects {
		width: 390px;
		min-height: 70px;
		float: left;
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
					<div class="roles_projects">
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
					</div> <!-- end .curr_projects -->
					
					<div id="new_role" class="roles_projects">
					
						<h5>Add yourself to a project</h5>
						<div class="text">
					
							<select name="projects" id="roles_select">
							<? include('util/_project_select.php');	?>
							</select>
						
							<input id="new_proj_role" type="text" placeholder="What was your role?"/>
					</div><!-- end .text -->
						
				</div><!-- end #new_role -->
				
			<div id="save_roles_bubble" class="op">Save</div>
				
		</div><!-- end #userproject -->