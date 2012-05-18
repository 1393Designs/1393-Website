<? 

	include('include/header.php');
	$articles = getArticlesForBlog();
	
?>

<script type="text/javascript">

$(function() {

	$('#blog_tab').activate();
	
	$('#load_more').click(function() {
		after = $('#last').attr('value');
		dataString = 'action=loadMore&after="'+after+'"';
		articles = action('article', dataString);
		
		//$('#blog_articles').append(articles);
	
	});// load_more	

});

function renderPosts(obj) {

	container = $('#blog_articles');

	$(obj).each(function(i, val) {
		$(val).each(function(k, v) {
			title = v.title;
			text = v.content;
			
			el = $('<div class="article"/>')
			.html('<div class="heavy_purple">'+title+'</div>'+text);
			container.append(el);
			
			
		});
	});

};

</script>

<style>

#load_more {
	float: right;
}

#load_more:hover {
	cursor: pointer;
	text-decoration: underline;
}

</style>

	<div id="blog_articles">
			
			<?
				$counter = 0;
				$last = 0;
				foreach ($articles as $a) {
					$title = $a['title'];
					$text = htmlentities($a['content']);
					$author = $a['author'];
					$date = $a['post_date'];
					$weekday = date('D', strtotime($date));
					$month = date('M', strtotime($date));
					$day = date('d', strtotime($date));
					$timestamp = date('h:i a', strtotime($date));				
					$counter++;
				?>
					<div class="article">
						<div class="date">
							<span class="date_month"><? echo $month ?></span>
							<span class="date_day"><? echo $day ?></span>
						</div>
						<div class="heavy_purple"><? echo $title ?></div>
						<? echo $text ?>
						<p class="details">Posted by <?= $author ?> on <?= $weekday ?> @ <?= $timestamp ?></p>
					<?
						if ($counter == 8) {
							$last = $date;
							echo "<input id='last' type='hidden' value='$last'/>";
						}
					?>
					</div>
				
				<? } ?>
				
				<div id="load_more">Load more&nbsp;&raquo;</div>
				
		</div><!-- end #blog_articles -->
		
			
<? include('include/footer.php'); ?>