<?php
require_once '../modules/poll.php';

if(!isset($_GET['poll'])){
	header('Location: poll.php');
} else {
	$id = (int)$_GET['poll'];
	$pollQuery = $konektor->prepare("SELECT id, question FROM polls WHERE id = :poll AND DATE(NOW()) BETWEEN start AND ends");
	$pollQuery->execute(['poll'=>$id]);
	$poll = $pollQuery->fetchObject();
	$answerQuery = $konektor->prepare("
		SELECT polls_choices.id AS choice_id, polls_choices.name AS choice_name
		FROM polls_answers 
		JOIN polls_choices 
		ON polls_answers.choice = polls_choices.id 
		WHERE polls_answers.user = :user 
		AND polls_answers.poll = :poll
	");
	$answerQuery->execute([
		'user' => $_SESSION['user_id'],
		'poll' => $id
	]);
	$completed = $answerQuery->rowCount() ? true : false;
	if($completed){
		$answerQuery = $konektor->prepare("
			SELECT polls_choices.name, COUNT(polls_answers.id) * 100 / (
				SELECT COUNT(*)
				FROM polls_answers
				WHERE polls_answers.poll = :poll) AS precentage
			FROM polls_choices
			LEFT JOIN polls_answers
			ON polls_choices.id = polls_answers.choice
			WHERE polls_choices.poll = :poll
			GROUP BY polls_choices.id
		");
		$answerQuery->execute([
			'poll' => $id
		]);
		while($row = $answerQuery->fetchObject()){
			$answers[] = $row;
		}
	}
	else {
		$choisesQuery = $konektor->prepare("
			SELECT polls.id, polls_choices.id AS choice_id, polls_choices.name
			FROM polls JOIN polls_choices 
			ON polls.id = polls_choices.poll 
			WHERE polls.id = :poll AND DATE(NOW()) BETWEEN polls.start AND polls.ends");
		$choisesQuery->execute(['poll'=>$id]);
		while($row = $choisesQuery->fetchObject()){
			$choices[] = $row;
		}
	}
}
?>
<?php if(!$poll): ?>
	<p>That poll doesn't exist</p>
<?php else: ?>
<div id = "anketa">
	<p class = "snketaPitanje">
		<?php echo $poll->question; ?>
	</p>
	<?php if($completed):?>
		<p>You have compleated this poll, thanks.</p>
		<ul>
			<?php foreach ($answers as $answer): ?>
				<li><?php echo $answer->name; ?> (<?php echo number_format($answer->precentage, 2); ?>%)</li>
			<?php endforeach; ?>
		</ul>
	<?php else:?>
		<?php if(!empty($choices)): ?>
			<form action = "../modules/vote.php" method = "POST">
				<div class = "odgovoriW">
					<?php foreach($choices as $index => $choice): ?>
						<div class = "odgovor">
							<input type = "radio" name = "choice" value = "<?php echo $choice->choice_id ?>" id = "<?php echo $index; ?>">
							<lable for = "c<?php echo $index; ?>"><?php echo $choice->name; ?></lable>
						</div>
					<?php endforeach; ?>
				</div>
				<input type = "submit" value = "Prijavi odgovore">
				<input type = "hidden" name = "poll" value = "<?php echo $id;?>">
			</form>
		<?php else: ?>
			<p>There are no choices right now.</p>
		<?php endif; ?>
	<?php endif; ?>
</div>
<?php endif; ?>