<script type="text/javascript">

/*
* function error(msg):
* Display the message as an error.
*/

function error(msg) {
	box = $('#notification');
	t = ($(window).height() + $(window).scrollTop())/2 - 50;
	box.css({	
		'left': '10px',
		'top': t });
	box.text(msg)
	.removeClass('success').addClass('error')
	.fadeTo('slow', 1, function() {
		$(this).delay(2000).fadeTo('slow', 0);
	});
}; // error


/*
* function finish(data, op):
* Display the 'op' message with the appropriate class (error, success)
* based on the result contained in data.
*/

function finish(data, op) {

	if (data.result_code==0) {
		msg = 'Error with ' +op;
		type = 'error';
	} else {
		msg = 'Successful ' +op;
		type = 'success';
	}
	
	box = $('#notification');
	t = ($(window).height() + $(window).scrollTop())/2 - 50;
	box.css({	
		'left': '10px',
		'top': t });
	box.text(msg)
	.removeClass('error').removeClass('success')
	.addClass(type)
	.fadeTo('slow', 1, function() {
		$(this).delay(2000).fadeTo('slow', 0);
	});
} // finish


/*
* The next few methods (projectOp, profileOp, articleOp)
* format a dataString properly based on the args passed in,
* and then pass it to in an .ajax call to the relevant PHP file
* for processing.
*/

function projectOp(action, id, name, purpose, blurb, details, slug) {
	
		if (name != '' && purpose != '' && blurb != '' && details != '') {
			
			dataString = 'action='+action+'&id='+id;
			dataString += '&name='+name;
			dataString += '&purpose='+purpose;
			dataString += '&blurb='+blurb;
			dataString += '&details='+details;
			dataString += '&slug='+slug;
			
			msg = 'project creation';
			if (action == 'saveProject') msg = 'project update';
			
			$.ajax({ 
						 type: 'post',
						 dataType: 'json',
						 url: 'data/project.php',
						 data: dataString,
						 success: function(data) {
						 	finish(data, msg);
						}, // end success
						error: function(xhr, textStatus, errorThrown) {
								error('Failed '+msg+'. ' +textStatus+ ': ' + errorThrown);
						}
				}); // end ajax
		} else {
			alert('Project missing fields.');
		}
}; // projectOp

function profileOp(text, blurb) {
	if (text != '') {
				id = $('#user_id').attr('value');
				dataString = 'action=saveProfile&id='+id+'&bio='+text+'&blurb='+blurb;
				
				$.ajax({ 
							 type: 'post',
							 dataType: 'json',
							 url: 'data/user.php',
							 data: dataString,
							 success: function(data) {
								 	finish(data, 'profile update');
							}, // end success
							error: function(xhr, textStatus, errorThrown) {
								error('Failed to save profile. ' +textStatus+ ': ' + errorThrown);
							}
					}); // end ajax
			} else {
				alert('Can\'t save blank profile.');
			}
}; // profileOp

function articleOp(action, id, title, text) {
		if (action=='createArticle') op = 'post creation';
		else if (action=='saveArticle') op = 'post update';
		else if (action=='deleteArticle') op = 'post deletion';

		if (text != '' && title != '') {
					
					dataString = 'action='+action+'&content='+text+'&title='+title+'&id='+id;
					
					$.ajax({ 
								 type: 'post',
								 dataType: 'json',
								 url: 'data/article.php',
								 data: dataString,
								 success: function(data) {
								 	finish(data, op);
								}, // end success
								error: function(xhr, textStatus, errorThrown) {
									error('Failed '+op+ '. ' +textStatus+ ': ' + errorThrown);
								}
						}); // end ajax
				} else {
					alert('Missing blog post fields.');
				}
}; // articleOp

</script>