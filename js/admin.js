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
		'top': t,
		'z-index': '50'});
	box.text(msg)
	.removeClass('success').addClass('error')
	.fadeTo('slow', 1, function() {
		$(this).delay(2000).fadeTo('slow', 0, function() {
			$(this).css('z-index', '-1');
		});
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
	box.stop();
	t = ($(window).height() + $(window).scrollTop())/2 - 50;
	box.css({	
		'left': '10px',
		'top': t,
		'z-index': '50'});
	box.text(msg)
	.removeClass('error').removeClass('success')
	.addClass(type)
	.fadeTo('slow', 1, function() {
		$(this).delay(2000).fadeTo('slow', 0, function() {
			$(this).css('z-index', '-1');
		});
	});
} // finish


/*
* The next few methods
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
			error('Project missing fields.');
		}
}; // projectOp

function action(entity, dataString, msg) {
	$file = 'data/'+entity+'.php';

	$.ajax({ 
						 type: 'post',
						 dataType: 'json',
						 url: $file,
						 data: dataString,
						 success: function(data) {
						 	finish(data, msg);
						}, // end success
						error: function(xhr, textStatus, errorThrown) {
								error('Failed '+msg+'. ' +textStatus+ ': ' + errorThrown);
						}
				}); // end ajax
} // action

function profileOp(action, text, blurb) {
	if (text != '') {
				id = $('#user_id').attr('value');
				dataString = 'action='+action+'&id='+id+'&bio='+text+'&blurb='+blurb;
				
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
				error('Can\'t save blank profile.');
			}
}; // profileOp

function articleOp(id, title, text) {
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
									error('Request failed. ' +textStatus+ ': ' + errorThrown);
								}
						}); // end ajax
				} else {
					error('Missing blog post fields.');
				}
}; // articleOp

function mapOp(action, msg) {

				$.ajax({ 
							 type: 'post',
							 dataType: 'json',
							 url: 'data/user.php',
							 data: dataString,
							 success: function(data) {
								 	finish(data, msg);
							}, // end success
							error: function(xhr, textStatus, errorThrown) {
								error('Failed to save profile. ' +textStatus+ ': ' + errorThrown);
							}
					});
}; // mapOp


</script>