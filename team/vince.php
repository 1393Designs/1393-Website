<? 

	include('../include/inside_header.php'); ?>

<script type="text/javascript">

$(function() {

	$('#team_tab').activate();
	id = $('#user_id').attr('value');
	
		dataString = 'action=getProfile&id='+id;
		$.ajax({
					 type: 'post',
					 dataType: 'json',
					 url: '../data/user.php',
					 data: dataString,
					 success: function(user) {
						$('#user_bio').html(user.bio);
						$('#user_blurb').html(user.blurb);						
						if (user.img_path != '') {
							$('#user_img').attr('src', '../'+user.img_path).show();
						}
					}, // end success
					error: function(xhr, textStatus, errorThrown) {
						 console.log('request failed' +textStatus + '->' + errorThrown);
					}
			}); // end ajax

});

</script>

<style>

h4 {
	margin: 20px 0 0 0;
	color: #57527E;
} 

#content img {
	float: right;
	padding: 0 20px 0 0;
}

</style>
			
			
	<input id="user_id" type="hidden" value="<?= 1 ?>"/>

	<h3>Vince</h3>			
	
	<img id='user_img' height="290" style="display: none" />
	
	<h4>Blurb</h4>
	<div id="user_blurb"></div>
	
	<h4>Bio</h4>
	<div id="user_bio"></div>
		
			
<? include('../include/footer.php'); ?>