
<script type="text/javascript">

$(function() {

	$('#login_link').click(function(e) {
		e.preventDefault();
		$('#login_box').toggle();
	});

});

</script>
<style>
#login_box {
	padding: 4px 10px;
	width: 280px;
	margin: 5px auto;
	border: 2px solid #57527E;
	background: #CFCFE8;
	color: #57527E;
	display: none;
}

</style>

		<div id="footer">
			Copyright 2012 1393 Designs&nbsp;|
			<a id="login_link" href="">Admin</a>
			
			<div id="login_box">
				<form method="post" action="">
					<label>Password:&nbsp;</label>
					<input type="password" name="password"/>
					<input type="submit" name="login" value="Go"/>
				</form>					
			</div><!-- end #login_box -->
			
		</div><!-- end #footer -->

</div><!-- end #container -->

</body>
</html>