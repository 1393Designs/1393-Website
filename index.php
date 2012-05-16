<?

	include('include/home_header.php');
	$articles = getRecentArticles();

?>

<script type="text/javascript">

$(function() {

	$('#home_tab').activate();

});

</script>

			<div id="articles">
				
				<h3>Latest Blog Posts</h3>
				<a href="blog.php" id="view_more">View More&nbsp;&raquo;</a>
				<br>
				<div class="clearfix"></div>
				
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
					<div class="article_preview">
					<div class="date">
						<span class="date_month"><? echo $month ?></span>
						<span class="date_day"><? echo $day ?></span>
						
					</div>
					<? echo $text ?>
					<p class="details">Posted by <?= $author ?> on <?= $weekday ?> @ <?= $timestamp ?></p>
					
				</div>
				
				<?
				
				} // end foreach
				
				?>
				
			</div><!-- end #articles -->
			
<? include('include/footer.php'); ?>