<?

include('include/home_nav.php');

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
				//	$month = $a['month'];
				//	$day = $a['day'];
					$month = 'April';
					$day = '40';
					$title = $a['title'];
					$text = $a['content'];
					$author = $a['author'];
					$date = $a['post_date'];
					$weekday = date('D', strtotime($date));
					$month = date('M', strtotime($date));
					$day = date('d', strtotime($date));
				
				?>
					<div class="article_preview">
					<div class="date">
						<div class="date_weekday"><? echo $weekday ?></div>
						<span class="date_month"><? echo $month ?></span>
						<span class="date_day"><? echo $day ?></span>
						
					</div>
					<? echo $text ?>
					<p class="details">Posted by <? echo $author ?> @ 11:07am</p>
					
				</div>
				
				<?
				
				} // end foreach
				
				?>
				
			</div>
			
		</div><!-- end #col2 -->
		
			
<? include('include/footer.php'); ?>