
<script type="text/javascript">
$(function() {

	$('.msg').click(function() {
		id = $(this).attr('id');
		$('#content_'+id).toggle();
	});
	
	$('.msg_cb').bind('change', function() {
		id_arr = $(this).attr('id').split('_');
		id = id_arr[1];
		dataString = 'action=msgCompleted&id='+id;
		action('contact', dataString, ' message update');
	});

	$('.delete_msg_cb').bind('change', function() {
			var c = confirm('Are you sure?');
			if (c) {
				id_arr = $(this).attr('id').split('_');
				id = id_arr[1];
				dataString = 'action=deleteMsg&id='+id;
				action('contact', dataString, ' message deletion');
			}
		});
	
	$('.reactivate_msg_cb').bind('change', function() {
			id_arr = $(this).attr('id').split('_');
			id = id_arr[1];
			dataString = 'action=activateMsg&id='+id;
			action('contact', dataString, ' message update');
		});

});
</script>

<style>

.msg_content {
	display: none;
}

.messages .msg_content td {
	border: 2px solid #57527E;
	padding: 5px;
}

.messages {
	padding: 14px 4px;
	margin: 0px auto;
}

.messages td {
	padding: 2px 5px 2px 0;
	width: 150px;
	word-wrap: break-word;
}

#currmessages a:link, #pastmessages a:link, .messages a:link {
	text-decoration: underline;
	color: #57527E;
}

th {
	text-align: left;
	width: 150px;
}

td.center, th.center {
	text-align: center;
}

</style>

	<div class="tabs">
		<h3 id="currmessages_tab" class="tab active_tab">Messages (<?= countMessages(); ?>)</h3>
		<h3 id="pastmessages_tab" class="tab">Past Messages</h3>
	</div>
	
		<div id="currmessages" class="tabbed section">
			<h5>Messages awaiting responses</h5>
			Pro Tip:&nbsp;&nbsp;Mark messages to which we've replied or want to ignore as inactive
			 so they move into 'past messages'
			
			<?
				$messages = getActiveMessages();
				
				if (!empty($messages)) { ?>
				<table id='messages_table' class='messages'>
					<thead>
						<th>Date received</th>
						<th>From</th>
						<th>Subject</th>
						<th class="center">Status</th>
						<th class="center">Message id</th>
						<th class="center">View contents</th>
					</thead>
				<?		foreach ($messages as $m) {
							$id = $m['id'];
							$from = $m['from_name'];
							$email = $m['from_email'];
							$subject = $m['subject'];
							$timestamp = $m['date'];
							$date = date('M d h:i a', strtotime($timestamp));
							$msg = $m['content'];
							?>
							
								<tr>
									<td><?= $date ?></td>
									<td><?= $from ?> (<a href="mailto:<?= $email ?>"><?= $email ?>)</a></td>
									<td><?= ($subject? $subject : 'No subject') ?></td>
									<td class="center">
										<input id="cb_<?= $id ?>" class="msg_cb" type="checkbox"/>&nbsp;Mark inactive
									</td>
									<td class="center"><?= $id ?></td>
									<td id="msg_<?= $id ?>" class="msg center"><div class="eye">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></td>
								</tr>
								<tr id="content_msg_<?= $id ?>" class="msg_content">
									<td colspan="6"><?= $msg ?></td>
								</tr>							
							<?
						}
					echo "</table>";
				} else {
					echo "None";
				}
			
			?>
				
		</div><!-- end #currmessages -->
		
		
		<div id="pastmessages" class="tabbed section" style="display:none">
			<h5>Inactive (replied to/ignored) messages (<?= countOldMessages(); ?>)</h5>
			
			<?
				$messages = getOldMessages();
				
				if (!empty($messages)) { ?>
				<table id='messages_table' class='messages'>
					<thead>
						<th>Date received</th>
						<th>From</th>
						<th>Subject</th>
						<th class="center">Reactivate</th>
						<th class="center">Delete</th>
						<th class="center">Message id</th>
						<th class="center">View contents</th>
					</thead>
					<?		
						foreach ($messages as $m) {
							$id = $m['id'];
							$from = $m['from_name'];
							$email = $m['from_email'];
							$subject = $m['subject'];
							$timestamp = $m['date'];
							$date = date('M d h:i a', strtotime($timestamp));
							$msg = $m['content'];
							$responder = $m['responder'];
							
							?>
							
								<tr>
									<td><?= $date ?></td>
									<td><?= $from ?> (<?= $email ?>)</td>
									<td><?= ($subject? $subject : 'No subject') ?></td>
									<td class="center">
										<input id="cb_<?= $id ?>" class="reactivate_msg_cb" type="checkbox"/>&nbsp;Mark active
									</td>
									<td class="center">
										<input id="cb_<?= $id ?>" class="delete_msg_cb" type="checkbox"/>&nbsp;Delete
									</td>
									<td class="center"><?= $id ?></td>
									<td id="msg_<?= $id ?>" class="msg center"><div class="eye">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></td>
								</tr>
								<tr id="content_msg_<?= $id ?>" class="msg_content">
									<td colspan="7"><?= $msg ?></td>
								</tr>
							
							<?
						}
					echo "</table>";
				} else {
					echo "None";
				}
			
			?>
				
		</div><!-- end #pastmessages -->
				