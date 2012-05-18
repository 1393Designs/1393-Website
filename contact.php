<? 

	include('include/header.php');
	
?>

<script type="text/javascript">

$(function() {

	$('#contact_tab').activate();
	
	$('#send_message').click(function(e) {
		e.preventDefault();
		name = $('#name').attr('value').trim();
		email = $('#email').attr('value').trim();
		subject = $('#subject').attr('value').trim();
		msg = $('#message').attr('value').trim();
		
		if (name != '' && email != '' && msg != '') {
				dataString = 'action=message&from_name='+name+'&from_email='+email+'&subject='+subject+'&content='+msg;
				action('contact', dataString);
				
				$('#form').fadeTo('slow', 0, function() {
					$(this).html('<h3>Thanks for reaching out!</h3>We\'ll get back to you shortly.');
					$(this).fadeTo('slow', 1);
				});
				
		} else {
			alert('Please fill out all fields.');
		}
	}); // #send_message

});

</script>

<style>
	
table {
	width: 500px;
}

table tr td:first-child {
	width: 70px;
}

input[type="text"], input["type=email"] {
	width: 420px;
}
	
table td {
	padding: 2px 5px;
}

.submit {
	margin: 0px auto;
	padding: 10px 0 0 0;
	text-align: center;
}
	
.long {
	min-width: 220px;
}

textarea {
	height: 70px;
	width: 100%;
}
	
</style>
	
	<div id="form">
		
			<h3>Drop us a line</h3>
			<h5>Just fill out this form and we'll get back to you!</h5>
			<br>
			
			<form action="" method="post">
				<table>
					<tr>
						<td>Your name</td>
						<td><input id="name" class="long" type="text" maxlength="255" autofocus /></td>
					</tr>
					<tr>
						<td>Your email</td>
						<td><input id="email" class="long" type="email" maxlength="255"/></td>
					</tr>
					<tr>
						<td>Subject</td>
						<td><input id="subject" class="long" type="text" maxlength="255"/></td>
					</tr>					
					<tr>
						<td>Message</td>
						<td><textarea id="message" maxlength="2000"></textarea></td>
					</tr>
					
					<tr>
						<td class="submit" colspan="2">
							<input id="send_message" name="send" value="Send" type="submit"/>
						</td>
					</tr>
				</table>
		
			</form>
	
	</div><!-- end #form -->
	
<? include('include/footer.php'); ?>