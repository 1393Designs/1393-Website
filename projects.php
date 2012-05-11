
<? include('include/nav.php'); ?>

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
			
			<p>Beef ribs pork loin swine ham, ground round jowl spare ribs tri-tip turducken shankle pork pastrami hamburger. Filet mignon tenderloin tail, venison t-bone pork belly pastrami ham hock hamburger speck shank jowl. Meatloaf corned beef filet mignon, leberkas pork loin boudin short loin bresaola pork belly bacon ham tail. Hamburger ground round venison pork loin biltong leberkas, brisket meatball shankle shoulder tri-tip corned beef pig rump. Sirloin pig hamburger, shoulder ribeye frankfurter corned beef.</p><br>
			<p>Biltong short loin spare ribs frankfurter, beef bacon chuck short ribs rump. Salami pastrami meatloaf, short ribs boudin beef meatball capicola hamburger venison rump. Pancetta ribeye t-bone, pig brisket beef sausage short loin. Brisket tri-tip speck hamburger biltong, meatloaf short ribs bresaola frankfurter andouille ham hock swine capicola sausage pork loin. Venison rump salami meatloaf ham speck, tongue shankle short ribs. Pastrami ham spare ribs, shoulder beef ribs pork belly turkey sirloin shankle.</p><br>
			<p>Shank speck pork loin hamburger turkey tri-tip. Hamburger meatball salami frankfurter. Hamburger beef ribs capicola frankfurter. Beef shankle shank turducken, spare ribs rump frankfurter pancetta pork loin kielbasa.</p>
					
	</div><!-- end #content -->
		
			
<? include('include/footer.php'); ?>