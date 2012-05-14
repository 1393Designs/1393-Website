<script type="text/javascript">

$(function() {

	$('#login_link').click(function(e) {
		e.preventDefault();
		box = $('#login_box');
		w = ($(window).width() - box.width()) /2;
		t = ($(window).height() + $(window).scrollTop()) /2;
		box.css({	'left': w, 'top': t }).fadeIn();    
    $('#modal').fadeIn();
	});
	
	$('#close').click(function() {
		$('#login_box').fadeOut();
		$('#modal').fadeOut();
	});

});

</script>
<style>
#login_box {
	padding: 20px;
	display: none;
	position: absolute;
	bottom: 0;
	right: 0;
	z-index: 99;
	color: #57527E;
	width: 500px;
	height: 120px;
	padding: 20px;
	background: #CFCFE8;
	border: thick solid #57527E;
}

#login_box h3 {
	text-align: center;
	margin: 0;
}

#modal {
	width: 100%;
	height: 100%;
	position: fixed;
	top: 0;
	left: 0;
	z-index: 9;
	opacity: .5;
	background: #333;
	display: none;
}

#login_box table {
	margin: 0px auto;
	text-align: left;
}

#close {
	float: right;
	margin-top: -1em;
	margin-right: -10px;
	cursor: pointer;
}

#go {
	text-align: center;
}

.center {
	text-align: center;
}

</style>

<?

	$email = $_SESSION['email'];
	
	if (empty($email) && isset($_COOKIE['email'])) {
		$email = $_COOKIE['email'];
		$pass = $_COOKIE['pass'];
	}

?>

		<div id="footer">
			Copyright 2012 1393 Designs&nbsp;|
			
			<? if (empty($email)) { ?>
				<a id="login_link" href="">Admin</a>
			
			<? } else  { ?>
			
				<a href="admin.php"><?= $email ?></a>	
			
			<? } ?>			
			
		</div><!-- end #footer -->
</div><!-- end #container -->

<div id="modal"></div>
<div id="login_box">
	<form method="post" action="admin.php">
		<span id="close">[x]</span>
		<h3>Admin Login</h3>
		<?= $email . ' is email'?>
		<table>
			<tr>
				<td>Email:</td>
				<td><input id="email" value="<?= $email ?>" type="email" name="email" required autofocus/></td>
			</tr>
			<tr><td>Password:</td><td><input id="pass" value="<?= $pass ?>" type="password" name="pass" required/></td></tr>
			<tr><td class="center" colspan="2"><input id="go" type="submit" name="login" value="Go"/></td></tr>
		</table>
	</form>					
</div><!-- end #login_box -->

</body>
</html>