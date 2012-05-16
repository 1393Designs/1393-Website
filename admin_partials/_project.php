
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
							<td class="fill_parent"><input class="fill_parent" id="app_purpose" type="text" placeholder="To help people do... (1 - 2 sentences)"/></td>
						</tr>
						<tr>
							<td>Blurb</td>
							<td class="fill_parent"><input class="fill_parent" id="app_blurb" type="text" placeholder="Useful for people who ... Does X, Y, Z and allows the user to ... (1-2 sentences)"/></td>
						</tr>
						<tr>
							<td>Slug</td>
							<td class="fill_parent"><input class="fill_parent" id="app_slug" type="text" placeholder="If page exists, like proj_name.php (no spaces)"/></td>
						</tr>
					</table>
					<textarea id="app_details" placeholder="More app details" rows="5" cols="60" required></textarea>
					<div id="create_proj_bubble" class="op">Create</div>
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
							<option value="<?= $id ?>"><?= $name ?></option>
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
							<tr>
								<td>Slug</td>
								<td class="fill_parent"><input class="fill_parent" id="edit_proj_slug" type="text" placeholder="If page exists, like proj_name.php (no spaces)"/></td>
							</tr>
						</table>
						<textarea id="edit_proj_details" placeholder="More app details" rows="5" cols="60" required></textarea>
						<div id="save_proj_bubble" class="op">Save</div>