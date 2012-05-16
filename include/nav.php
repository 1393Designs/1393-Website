<script type="text/javascript">

$(function() {

	$('.nav_link').hover(function() {
		$(this).siblings('.menu').toggle();
	});
	
	$('.menu').hover(function() {
		$(this).toggle();
		$(this).siblings('.nav_link').toggleClass('hover_tab');
	});

});

$.fn.activate = function() {
	$(this).siblings().removeClass('active_tab');
	$(this).addClass('active_tab');
	
	var name = $(this).attr('id').split('_tab');
	var new_title = capitalize(name[0]);
	document.title = '1393 Designs | ' +new_title;
};

function capitalize(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
};

</script>
		
			<div id="nav">
				<ul id="nav_links">
					<li><a class="nav_link" id="home_tab" href="<?= URL ?>/index.php">Home</a></li>
					<li><a class="nav_link" id="blog_tab" href="<?= URL ?>/blog.php">Blog</a></li>
					<li><a class="nav_link" id="team_tab" href="<?= URL ?>/team.php">Team</a>
						<ul id="users_menu" class="menu" style="display:none">
						<? 
						$users = getUsers();						
						foreach ($users as $u) {
							$username = $u['name'];
							$user_slug = $u['slug'];
							$user_url = URL ."/team.php";
						 	if (!empty($user_slug)) {
						 		$user_url = URL .'/'. $user_slug;
						 	}
						?>
						<li><a href="<?= $user_url ?>"><?= $username ?></a></li>							
						<? } ?>
						
						</ul>	
					</li>
					<li>
						<a class="nav_link" id="projects_tab" href="<?= URL ?>/projects.php">Projects</a>
						<ul id="projects_menu" class="menu" style="display:none">
							<?
							$projects = getProjects();							
							foreach ($projects as $p) {
								$name = $p['name'];
								$slug = $p['slug'];
								
								$url = 'projects.php';
								if (!empty($slug)) $url = $slug;
								
							?>							
							<li><a href="<?= $url ?>"><?= $name ?></a></li>							
							<? } ?>
						</ul>						
					</li>
					<li><a id="contact_tab" href="<?= URL ?>/contact.php">Contact</a></li>
				</ul>
			</div>