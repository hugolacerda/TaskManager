<h2>Editing <span class='muted'>Task</span></h2>
<br>

<?php echo render('tasks/_form'); ?>
<p>
	<?php echo Html::anchor('tasks/view/'.$task->id, 'View'); ?> |
	<?php echo Html::anchor('tasks', 'Back'); ?></p>
