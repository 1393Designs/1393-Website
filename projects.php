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
	padding: 0 0 0 20px;
}

.text {
	float: left;
	text-align: justify;
	padding: 0 0 10px 0;
	min-width: 600px;
}

#content {
	margin-top: -15px;
}

</style>
			<div class="fadein">
				<?
					foreach ($projects as $p) {
						$img_path = stripslashes($p['img_path']);
				?>
				
				<? if (!empty($img_path)) { ?>			
					<img src="<?= $img_path ?>" width="300"/>
				<? }
					}?>
				
		</div>
			
			<?
							
			foreach ($projects as $p) {
				$name = stripslashes($p['name']);
				$blurb = stripslashes($p['blurb']);
				$img_path = stripslashes($p['img_path']);
				$slug = $p['slug'];
				
				$url = 'projects.php';
				if (!empty($slug)) $url = $slug;
				
			?>
			<div class="proj">
				<a href="<?= $url ?>"><h4><?= $name ?></h4></a>	
					<div class="text">		
				<? if (!empty($img_path)) { ?>			
					<img src="<?= $img_path ?>" height="60"/>
				<? } ?>
					<?= $blurb ?></div>		
			</div>
			<?	}  ?>
		
			
<? include('include/footer.php'); ?>