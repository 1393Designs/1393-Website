<?

	include('data/config.php');
	include('data/sql.php');
	include('data/article.php');

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
<link type="text/css" rel="stylesheet" href="style/home.css"/>
<link type="text/css" rel="stylesheet" href="style/nav.css"/>

<link href='http://fonts.googleapis.com/css?family=Maven+Pro' rel='stylesheet' type='text/css'>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript">

$(function() {



});

$.fn.activate = function() {
	$(this).siblings().removeClass('active_tab');
	$(this).addClass('active_tab');
};

</script>
</head>
<body>

<div id="container">

		<div class="big_col" id="col1">
			
			<div id="tagline">
				A small group of software developers making
				<span class="heavy_grey">mobile visions</span>
				into 
				<span class="heavy_purple">realities.</span>
			</div><!-- end #tagline -->
			
		</div><!-- end #col1 -->
		
		<div class="big_col" id="col2">
		
		
			<div id="nav">
				<ul id="nav_links">
					<li><a id="home_tab" href="index.php">Home</a></li>
					<li><a id="blog_tab" href="blog.php">Blog</a></li>
					<li><a id="team_tab" href="team.php">Team</a></li>
					<li><a id="projects_tab" href="projects.php">Projects</a></li>
					<li><a id="contact_tab" href="contact.php">Contact</a></li>
				</ul>
			</div>