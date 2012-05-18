
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

});
</script>

<style>

.msg_content {
	display: none;
}

.msg_content td {
	border: 2px solid #57527E;
	padding: !important 5px;
}

.msg {
	cursor: pointer;
}

.msg:hover {
	font-weight: bold;
	color: #57527E;
}

.messages {
	padding: 4px 0 0 10px;
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

</style>

	<div class="tabs">
		<h3 id="currmessages_tab" class="tab active_tab">Messages (<?= countMessages(); ?>)</h3>
		<h3 id="pastmessages_tab" class="tab">Past Messages (<?= countOldMessages(); ?>)</h3>
	</div>
	
		<div id="currmessages" class="tabbed section">
			<h5>Messages awaiting responses</h5>
			
			<?
				$messages = getActiveMessages();
				
				if (!empty($messages)) { ?>
				<table id='messages_table' class='messages'>
					<thead>
						<th>Date received</th>
						<th>From</th>
						<th>Subject</th>
						<th>Status</th>
						<th>Message id</th>
						<th>View message contents</th>
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
									<td><?= ($subject? $subject : '(No subject)') ?></td>
									<td><input id="cb_<?= $id ?>" class="msg_cb" type="checkbox"/>&nbsp;We've replied</td>
									<td><?= $id ?></td>
									<td id="msg_<?= $id ?>" class="msg">[View]</td>
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
			<h5>Messages that have been responded to</h5>
			
			<?
				$messages = getOldMessages();
				
				if (!empty($messages)) { ?>
				<table id='messages_table' class='messages'>
					<thead>
						<th>Date received</th>
						<th>From</th>
						<th>Subject</th>
						<th>Status</th>
						<th>Message id</th>
						<th>View message contents</th>
					</thead>
				<?		foreach ($messages as $m) {
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
									<td><? if ($responder) {
												echo $responder . ' responded';
											}
											?>
									</td>
									<td><?= $id ?></td>
									<td id="msg_<?= $id ?>" class="msg">[View]</td>
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
				
		</div><!-- end #pastmessages -->
				