
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
					<table>
						<tr>
							<td>Blurb&nbsp;</td>
							<td class="fill_parent"><input id="user_blurb" value="<?= $user_blurb ?>" class="fill_parent" type="text" placeholder="Education/current position, interesting personal fact :)" /></td>
						</tr>
					</table>
					<?
						$roles = getRoles($_SESSION['user_id']);
						
						if (!empty($roles)) {
						
							foreach ($roles as $p) {
								$proj_name = $p['name'];
								$proj_id = $p['id'];
							
								
								echo $proj_name . ": $proj_id <br><br>";
														
								
							}
						}
					
					?>
					
					<div id="save_roles_bubble" class="op">Save</div>
				</div><!-- end #userproject -->