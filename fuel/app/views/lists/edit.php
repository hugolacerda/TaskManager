<h2>Editing <span class='muted'>List</span></h2>
<br>

<?php echo render('lists/_form'); ?>
<p>
	<?php echo Html::anchor('lists/view/'.$list->id, 'View'); ?> |
	<?php echo Html::anchor('lists', 'Back'); ?></p>
