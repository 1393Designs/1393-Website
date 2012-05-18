<script type="text/javascript">

function action(entity, dataString, msg) {
	$file = 'data/'+entity+'.php';

	$.ajax({ 
						 type: 'post',
						 dataType: 'json',
						 url: $file,
						 data: dataString,
						 success: function(data) {
						}, // end success
						error: function(xhr, textStatus, errorThrown) {
								console.log('Failed '+msg+'. ' +textStatus+ ': ' + errorThrown);
						}
				}); // end ajax
}; // action

function action(entity, dataString) {
	$file = 'data/'+entity+'.php';

	$.ajax({ 
						 type: 'post',
						 dataType: 'json',
						 url: $file,
						 data: dataString,
						 success: function(data) {
						 		console.log('success '+dataString);
						 		renderPosts(data.response);
						}, // end success
						error: function(xhr, textStatus, errorThrown) {
								console.log('Request failed. ' +textStatus+ ': ' + errorThrown);
						}
				}); // end ajax
				
} // action

</script>