<?

?>

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
					<li><a class="nav_link" id="home_tab" href="index.php">Home</a></li>
					<li><a class="nav_link" id="blog_tab" href="blog.php">Blog</a></li>
					<li><a class="nav_link" id="team_tab" href="team.php">Team</a><ul id="projects_menu" class="menu" style="display:none">
							<li><a href="">Vince</a></li>
							<li><a href="">Sean</a></li>
							<li><a href="">Kim</a></li>
							<li><a href="">Rob</a></li>
							<li><a href="">Joel</a></li>
						</ul>	
					</li>
					<li>
						<a class="nav_link" id="projects_tab" href="projects.php">Projects</a>
						<ul id="projects_menu" class="menu" style="display:none">
							<?
							
							foreach ($projects as $p) {
								$name = $p['name'];
							?>
							
							<li><a href="projects.php"><? echo $name ?></a></li>
							
							<?
							
							}
							
							?>
						</ul>						
					</li>
					<li><a id="contact_tab" href="contact.php">Contact</a></li>
				</ul>
			</div>