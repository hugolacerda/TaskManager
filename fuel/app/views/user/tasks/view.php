<h2>Viewing <span class='muted'>#<?php echo $task->id; ?></span></h2>

<p>
	<strong>Title:</strong>
	<?php echo $task->title; ?></p>
<p>
	<strong>Due:</strong>
	<?php echo $task->due; ?></p>
<p>
	<strong>Location:</strong>
	<?php echo $task->location; ?></p>
<p>
	<strong>Note:</strong>
	<?php echo $task->note; ?></p>
<p>
	<strong>Tasklist:</strong>
	<?php echo $task->tasklist; ?></p>
<p>
	<strong>User id:</strong>
	<?php echo $task->user_id; ?></p>

<?php echo Html::anchor('tasks/edit/'.$task->id, 'Edit'); ?> |
<?php echo Html::anchor('tasks', 'Back'); ?>