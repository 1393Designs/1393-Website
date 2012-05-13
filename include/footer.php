
<script type="text/javascript">

$(function() {

	$('#login_link').click(function(e) {
		e.preventDefault();
		
		var top, left, login_box;
		login_box = $('#login_box');

    top = $(window).height() / 4;
    left = $(window).width() / 4;

    login_box.css({
        top:top, 
        left:left
    }).fadeIn();
    
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
	padding: 20px 50px;
	display: none;
	position: absolute;
	z-index: 10;
	color: #57527E;
	min-width: 500px;
	min-height: 50px;
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

</style>

		<div id="footer">
			Copyright 2012 1393 Designs&nbsp;|
			<a id="login_link" href="">Admin</a>
			
			<div id="login_box">
				<form method="post" action="">
					<span id="close">[x]</span>
					<h3>Admin Login</h3>
					<table>
						<tr><td>Email:</td><td><input type="email" name="email" required/></td></tr>
						<tr><td>Password:</td><td><input type="password" name="password" required/></td></tr>
					</table>
					<input type="submit" name="login" value="Go"/>
				</form>					
			</div><!-- end #login_box -->
			
		</div><!-- end #footer -->

</div><!-- end #container -->

<div id="modal"></div>

</body>
</html>