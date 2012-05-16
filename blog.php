<? 

	include('include/header.php');
	$articles = getArticles();
	
?>

<script type="text/javascript">

$(function() {

	$('#blog_tab').activate();

});

</script>
			
			
			<div id="content">
			
			<?
				
				foreach ($articles as $a) {
					$title = $a['title'];
					$text = htmlentities($a['content']);
					$author = $a['author'];
					$date = $a['post_date'];
					$weekday = date('D', strtotime($date));
					$month = date('M', strtotime($date));
					$day = date('d', strtotime($date));
					$timestamp = date('h:i a', strtotime($date));				
				
				?>
					<div class="article">
					<div class="date">
						<span class="date_month"><? echo $month ?></span>
						<span class="date_day"><? echo $day ?></span>
					</div>
					<div class="heavy_purple"><? echo $title ?></div>
					<? echo $text ?>
					<p class="details">Posted by <?= $author ?> on <?= $weekday ?> @ <?= $timestamp ?></p>
					
				</div>
				
				<?
				
				} // end foreach
				
				?>	
				
				</div><!-- end #content -->
		
			
<? include('include/footer.php'); ?>