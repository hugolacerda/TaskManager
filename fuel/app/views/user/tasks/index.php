<h2>Listing <span class='muted'>Tasks</span></h2>
<br>
<?php if ($tasks): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Title</th>
			<th>Due</th>
			<th>Location</th>
			<th>Note</th>
			<th>Tasklist</th>
			<th>User id</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($tasks as $item): ?>		<tr>

			<td><?php echo $item->title; ?></td>
			<td><?php echo $item->due; ?></td>
			<td><?php echo $item->location; ?></td>
			<td><?php echo $item->note; ?></td>
			<td><?php echo $item->tasklist; ?></td>
			<td><?php echo $item->user_id; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('tasks/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-small')); ?>						<?php echo Html::anchor('tasks/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-small')); ?>						<?php echo Html::anchor('tasks/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-small btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Tasks.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('user/tasks/create', 'Add new Task', array('class' => 'btn btn-success')); ?>

</p>
