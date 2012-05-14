<? include('include/header.php'); ?>

<script type="text/javascript">

$(function() {

	$('#projects_tab').activate();
	id = $('#project_id').attr('value');
	
		dataString = 'action=getProject&id='+id;
		$.ajax({
					 type: 'post',
					 dataType: 'json',
					 url: 'data/project.php',
					 data: dataString,
					 success: function(proj) {
						$('#proj_name').text(proj.name);
						$('#proj_purpose').text(proj.purpose);
						$('#proj_blurb').text(proj.blurb);
						$('#proj_details').text(proj.details);
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
</style>
			
<div id="content">
	<input id="project_id" type="hidden" value="<?= 1 ?>"/>

	<h3>Textpansion</h3>
	
	<h4>Purpose</h4>
	<div id="proj_purpose"></div>
	
	<h4>In Brief</h4>
	<div id="proj_blurb"></div>
	
	<h4>Details</h4>
	<div id="proj_details"></div>

</div><!-- end #content -->
		
			
<? include('include/footer.php'); ?>