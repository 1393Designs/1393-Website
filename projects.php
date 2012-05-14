<?

	include('include/header.php'); 
	$projects = getProjects();
?>

<script type="text/javascript">

$(function() {

	$('#projects_tab').activate();
	
	$(".image").click(function() {
	var image = $(this).attr("rel");
	$('#image').hide();
	$('#image').fadeIn('slow');
	$('#image').html('<img src="' + image + '"/>');
	return false;
});

});

</script>

<style>
#image {
	border: 4px solid #ccc;
	height:250px;
	width:500px;
}

.thumb {
	float:left;
	margin-right:10px;
	margin-top:10px;
}

#thumbs_container {
}

.proj {
	margin: 10px 0 0 0;
}

h4 {
	color: #57527E;
}

</style>
			
	<div id="content">
			
			<div id="image">
				<img src="images/1.jpg" border="0"/>
			</div>
			
			<div id="thumbs_container">
			
				<a href="#" rel="images/1.jpg" class="image"><img height="40" src="images/1.jpg" class="thumb" border="0"/></a>
				<a href="#" rel="images/2.jpg" class="image"><img height="40" src="images/2.jpg" class="thumb" border="0"/></a>
				<a href="#" rel="images/3.jpg" class="image"><img height="40" src="images/3.jpg" class="thumb" border="0"/></a>
			
			</div>
			
			<div class="clearfix"><br></div>
			
			<?
							
			foreach ($projects as $p) {
				$name = stripslashes($p['name']);
				$blurb = stripslashes($p['blurb']);
				$slug = $p['slug'];
				
				$url = 'projects.php';
				if (!empty($slug)) $url = $slug;
				
			?>
			<div class="proj">
				<a href="<?= $url ?>"><h4><?= $name ?></h4></a>
				<? echo $blurb ?>
			</div>
			<?
			
			}
			
			?>
			
				
	</div><!-- end #content -->
		
			
<? include('include/footer.php'); ?>