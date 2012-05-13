<?

	include('data/config.php');
	
	$projects = getProjects();
?>

<!DOCTYPE html>
<html>
<head>

<title>1393 Designs | Home</title>

<meta charset="utf-8"/>
<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<link rel="stylesheet" media="all" href=""/>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<!-- Adding "maximum-scale=1" fixes the Mobile Safari auto-zoom bug: http://filamentgroup.com/examples/iosScaleBug/ -->

<link type="text/css" rel="stylesheet" href="style/reset.css"/>
<link type="text/css" rel="stylesheet" href="style/base.css"/>
<link type="text/css" rel="stylesheet" href="style/nav.css"/>
<link type="text/css" rel="stylesheet" href="style/inside.css"/>
<link href='http://fonts.googleapis.com/css?family=Maven+Pro' rel='stylesheet' type='text/css'>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="../jquery.min.js"></script>
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
</head>
<body>

<div id="container">

		<div class="big_col" id="col1">
			<div id="search_box">
				<input type="search" placeholder="Search"/>
				<a href="search.php" id="search"></a>
			</div>
			
		</div><!-- end #col1 -->
		
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
							
							<li><a href="projects/<? echo strtolower($name) ?>.php"><? echo $name ?></a></li>
							
							<?
							
							}
							
							?>
						</ul>						
					</li>
					<li><a id="contact_tab" href="contact.php">Contact</a></li>
				</ul>
			</div>