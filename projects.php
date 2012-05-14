<?

	include('include/header.php'); 
	$projects = getProjects();
?>

<script type="text/javascript">

$(function() {

	$('#projects_tab').activate();
	
	$('.fadein img:gt(0)').hide();
    setInterval(function(){
      $('.fadein :first-child').fadeOut()
         .next('img')
         .fadeIn()
         .end().appendTo('.fadein');}, 
      5000);

});

</script>

<style>

.proj {
	clear: both;
	margin: 10px 20px 10px 0;
}

h4 {
	color: #57527E;
	margin: 10px 0 0 0;
}

.fadein { 
	position: relative; 
	width: 500px;
	min-height: 230px;
	margin: -10px auto;
}

.fadein img { 
	position: absolute;
	left: 100px; 
	padding: 10px 0;
}

.proj img {
	float: right;
}

.text {
	float: left;
	width: 70%;
	padding: 0 0 10px 0;
}

#content {
	margin-top: -15px;
}

</style>
			
	<div id="content">
	
			<div class="fadein">
				<img width="300" src="images/projects/textspansion.png">
				<img width="300" src="images/projects/punchtracker.png">
				<img width="300" src="images/projects/txtencrypt.png">
			</div>
			
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
				<div class="text"><?= $blurb ?></div>				
				<img src="images/projects/<?= $name ?>.png" height="60"/>				
			</div>
			<?
			
			}
			
			?>
			
				
	</div><!-- end #content -->
		
			
<? include('include/footer.php'); ?>