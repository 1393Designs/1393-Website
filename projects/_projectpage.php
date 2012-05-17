<? include('../include/inside_header.php'); ?>

<script type="text/javascript">

$(function() {

	$('#projects_tab').activate();
	id = $('#project_id').attr('value');
	
		dataString = 'action=getProject&id='+id;
		$.ajax({
					 type: 'post',
					 dataType: 'json',
					 url: '../data/project.php',
					 data: dataString,
					 success: function(proj) {
						$('#proj_name').text(proj.name);
						$('#proj_purpose').html(proj.purpose);
						$('#proj_blurb').html(proj.blurb);
						$('#proj_details').html(proj.details);
						$('#proj_img').attr('src', '../'+proj.img_path).show();
					}, // end success
					error: function(xhr, textStatus, errorThrown){
						 alert('request failed' +textStatus + '->' + errorThrown);
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

	<h3 id="proj_name"></h3>			
	
	<img id='proj_img' height="90" style="display: none" />
	
	<h4>Purpose</h4>
	<div id="proj_purpose"></div>
	
	<h4>How it Works</h4>
	<div id="proj_blurb"></div>
	
	<h4>Details</h4>
	<div id="proj_details"></div>