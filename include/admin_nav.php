<?

	session_start();
	include('data/config.php');
	include('data/login.php');
	
	if (!session_is_registered('admin')) { //If session not registered as admin
		header('location:index.php'); 			// then redirect to homepage.
	} else { 															//else continue to admin page
		header('Content-Type: text/html; charset=utf-8');
	}

?>

<!DOCTYPE html>
<html>
<head>

<title>1393 Designs | Admin</title>

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
<link type="text/css" rel="stylesheet" href="style/admin.css"/>
<link href='http://fonts.googleapis.com/css?family=Maven+Pro' rel='stylesheet' type='text/css'>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="../../jquery.min.js"></script>

<script type="text/javascript">

$(function() {

	$('.tab').click(function() {
	
		var el = $(this);
		sect = el.attr('id').split('_');
		sect = $('#'+sect[0]);
		sect.show();
		sect.siblings('.section.tabbed').hide();
		$(el).siblings('.active_tab').removeClass('active_tab');
		$(el).addClass('active_tab');		
	
	});

});

</script>

</head>
<body>

<div id="container">