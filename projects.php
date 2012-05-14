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
	
	$('.fadein img:gt(0)').hide();
    setInterval(function(){
      $('.fadein :first-child').fadeOut()
         .next('img').fadeIn()
         .end().appendTo('.fadein');}, 
      5000);

});

</script>

<style>

.thumb {
	float: left;
	margin-right: 10px;
	margin-top: 10px;
}

#thumbs_container {
	margin-top: -60px;
	margin-bottom: 40px;
}

.proj {
	margin: 10px 0 0 0;
}

h4 {
	color: #57527E;
}

.fadein { position:relative; width:500px; height:332px; }
.fadein img { position:absolute; left:0; top:0; border: thick solid #efefef; }

</style>
			
	<div id="content">
	
			<div class="fadein">
				<img src="images/1.jpg">
				<img src="images/2.jpg">
				<img src="images/3.jpg">
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