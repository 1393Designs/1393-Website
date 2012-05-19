<? 

	include('include/header.php');
	$articles = getArticlesForBlog();
	
?>

<script type="text/javascript">

$(function() {

	$('#blog_tab').activate();
	
	$('#load_more').bind('click', function() {
		before = $('#last').attr('value');
		dataString = 'action=loadMore&before='+before;
		action('article', dataString);	
	});// load_more	

});

function renderPosts(obj) {

	markup = '';

	$(obj).each(function(i, val) {
		$(val).each(function(k, post) {
			title = post.title;
			text = post.content;
			author = post.author;
			date = post.post_date;
			weekday = post.weekday;
			day = post.day;
			month = post.month;
			timestamp = post.timestamp;
			
			el = '<div class="article">'
			+'<div class="date"><span class="date_month">'+month+'</span>'
			+'<span class="date_day">'+day+'</span></div>'
			+'<div class="heavy_purple">'+title+'</div>'+text
			+'<p class="details">Posted by '+author+ ' on '+weekday+' @ '+timestamp+' </p></div>';
			markup += el;	
	
			$('#last').attr('value', post.before); // reset so we can load more
		
		}); // each		
	}); // each
		
	anim = $('#anim');
	loader = $('#load_more');
	anim.css({'visibility':'visible'});
	
	setTimeout(function() {
		anim.css({'visibility':'hidden'}).detach();
		loader.detach();
		container = $('#blog_articles');
		
		if (markup != '') {
			container.append(markup);
			container.append(loader).append(anim);
		} else {
			msg = '<div style="float:right"><h5>No more posts to display</h5></div>';
			container.append(msg);
		}
	}, 800);
	
}; // renderPosts

</script>

<style>

#load_more {
	float: right;
}

#load_more:hover {
	cursor: pointer;
	text-decoration: underline;
}

#anim {
	height: 50px;
	width: 50px;
	background: url('images/loading.gif') no-repeat center;
	float: right;
	margin-top: -18px;
	visibility: hidden;
}

</style>

	<div id="blog_articles">
			
			<?
				$counter = 0;
				foreach ($articles as $a) {
					$title = $a['title'];
					$text = htmlentities($a['content']);
					$author = $a['author'];
					$date = $a['post_date'];
					$weekday = $a['weekday'];
					$month = $a['month'];
					$day = $a['day'];
					$timestamp = $a['timestamp'];	
					$before = $a['before'];
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
						if ($counter == 8) { // if it's the last entry
							echo "<input id='last' type='hidden' value='$before'/>";
						}
					?>
					</div>
				<? } ?>
			
				<div id="load_more">Load more&nbsp;&raquo;</div>
				<div id="anim"></div>
				
		</div><!-- end #blog_articles -->
		
			
<? include('include/footer.php'); ?>