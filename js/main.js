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
						 		renderPosts(data.response); // for blog
						}, // end success
						error: function(xhr, textStatus, errorThrown) {
								console.log('Request failed. ' +textStatus+ ': ' + errorThrown);
						}
				}); // end ajax
				
}; // action

	
function isValidEmail(email) {
    var pattern = new RegExp(/^(("[\w-+\s]+")|([\w-+]+(?:\.[\w-+]+)*)|("[\w-+\s]+")([\w-+]+(?:\.[\w-+]+)*))(@((?:[\w-+]+\.)*\w[\w-+]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][\d]\.|1[\d]{2}\.|[\d]{1,2}\.))((25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\.){2}(25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\]?$)/i);
    return pattern.test(email);
};

</script>