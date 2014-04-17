<h2>Viewing <span class='muted'>#<?php echo $list->id; ?></span></h2>

<p>
	<strong>Title:</strong>
	<?php echo $list->title; ?></p>
<p>
	<strong>Task id:</strong>
	<?php echo $list->task_id; ?></p>

<?php echo Html::anchor('lists/edit/'.$list->id, 'Edit'); ?> |
<?php echo Html::anchor('lists', 'Back'); ?>