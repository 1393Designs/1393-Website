<?

	session_start();
	$_SESSION['sessid'] = $_COOKIE['PHPSESSID'];
	include('data/config.php');	
	
	$email = $_SESSION['email'];
	if (!isset($email) && $_POST['login']) {
		$email = $_POST['email'];
		$pass = $_POST['pass'];
		$_SESSION['email'] = $email;
		setcookie('email', $email);
		setcookie('pass', $pass);
	}
		
	if (empty($email) || empty($pass) || !valid_login($email, $pass)) {
		session_destroy();
		header("location:index.php");
	}
	
	$do = $_GET['do'];
	if ($do == 'logout') {
			session_destroy(); 						//end admin session (effectively log out)
			header('Location:index.php'); // and return to index/main
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