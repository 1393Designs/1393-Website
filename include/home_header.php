<?

	session_start();
	
	$do = $_GET['do'];
	if ($do == 'logout') {
			session_destroy(); 						//end admin session (effectively log out)
			header('Location:index.php'); // and return to index/main
			
			?>
				<script>window.location='index.php';</script>
			<?
	}
	
	$_SESSION['sessid'] = $_COOKIE['PHPSESSID'];	
	include_once('data/base_config.php');
	include_once('data/config.php');
	$projects = getProjects();
	
?>

<!DOCTYPE html>
<html>
<head>

<title>1393 Designs | Home</title>

<meta name="description" content="Developers solving problems through mobile software solutions.">
<neta name="keywords" content="mobile, Android, Textspansion, development, programming, app">
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<meta charset="utf-8"/>
<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!-- Adding "maximum-scale=1" fixes the Mobile Safari auto-zoom bug: http://filamentgroup.com/examples/iosScaleBug/ -->

<link rel="apple-touch-startup-image" href="images/bg_v2.png" />
<link rel=icon sizes="57x57" type="image/png" href="images/icon.png">
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
<link type="text/css" rel="stylesheet" href="style/base.css"/>
<link type="text/css" rel="stylesheet" href="style/home.css"/>
<link type="text/css" rel="stylesheet" href="style/nav.css"/>
<link type="text/css" rel="stylesheet" href="style/reset.css"/>
<link href='http://fonts.googleapis.com/css?family=Maven+Pro' rel='stylesheet' type='text/css'>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="jquery.min.js"></script>

<? include('js/main.js'); ?>

</head>
<body>

<div id="container">
			
			<div id="tagline">
				A small group of software developers making
				<span class="heavy_grey">mobile visions</span>
				into 
				<span class="heavy_purple">realities.</span>
			</div><!-- end #tagline -->
			
			
			<? include('nav.php'); ?>