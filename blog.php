
<? include('include/nav.php'); 

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
				//	$month = $a['month'];
				//	$day = $a['day'];
					$month = 'April';
					$day = '40';
					$title = $a['title'];
					$text = $a['content'];
					$author = $a['author'];
					$date = $a['post_date'];
				
				?>
					<div class="article_preview">
					<div class="date">
						<span class="date_month"><? echo $month ?></span><span class="date_day"><? echo $day ?></span>
					</div>
					<div class="heavy_purple"><? echo $title ?></div>
					<? echo $text ?>
					<p class="details">Posted by <? echo $author ?> @ 11:07am</p>
					
				</div>
				
				<?
				
				} // end foreach
				
				?>	
				
				</div><!-- end #content -->
		
			
<? include('include/footer.php'); ?>