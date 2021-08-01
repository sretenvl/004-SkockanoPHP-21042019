<?php
	require_once "modules/poll.php";
	$pollsQuery = $konektor ->query("SELECT id, question FROM polls WHERE DATE(NOW()) BETWEEN start AND ends");
	while($row = $pollsQuery->fetchObject()){
		$polls[] = $row;
	}
	
?>
<?php if(!empty($polls)): ?>
	<ul>
		<?php foreach($polls as $poll): ?>
			<li><a href = "views/poll.php?poll=<?php echo $poll->id; ?>"><?php echo $poll->question; ?></a></li>
		<?php endforeach; ?>
	</ul>
<?php else: ?>
	<p>Sorry, no polls avaliable right now</p>
<?php endif; ?>