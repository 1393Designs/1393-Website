<?

	session_start();
	$_SESSION['sessid'] = $_COOKIE['PHPSESSID'];
	
	include_once('data/base_config.php');
	include('data/config.php');
	include('js/main.js');

?>

<!DOCTYPE html>
<html>
<head>

<title>1393 Designs | Home</title>

<META name="description" content="Developers solving problems through mobile software solutions.">
<META name="keywords" content="mobile, Android, Textspansion, development, programming, app">

<meta charset="utf-8"/>
<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<link rel="stylesheet" media="all" href=""/>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<!-- Adding "maximum-scale=1" fixes the Mobile Safari auto-zoom bug: http://filamentgroup.com/examples/iosScaleBug/ -->

<link type="text/css" rel="stylesheet" href="<?= URL ?>/style/reset.css"/>
<link type="text/css" rel="stylesheet" href="<?= URL ?>/style/base.css"/>
<link type="text/css" rel="stylesheet" href="<?= URL ?>/style/nav.css"/>
<link type="text/css" rel="stylesheet" href="<?= URL ?>/style/inside.css"/>
<link href='http://fonts.googleapis.com/css?family=Maven+Pro' rel='stylesheet' type='text/css'>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="../../jquery.min.js"></script>
</head>
<body>

<div id="container">
		
		<? include('nav.php'); ?>