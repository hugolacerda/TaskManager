<h2>Listing <span class='muted'>Lists</span></h2>
<br>
<?php if ($lists): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Title</th>
			<th>Task id</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($lists as $item): ?>		<tr>

			<td><?php echo $item->title; ?></td>
			
			<td>
				<!-- <div class="btn-toolbar">
					<div class="btn-group">
						<?php //echo Html::anchor('lists/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-small')); ?>						<?php echo Html::anchor('lists/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-small')); ?>						<?php echo Html::anchor('lists/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-small btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div> -->
				<?php echo Html::anchor('lists/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('lists/view/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('lists/view/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Lists.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('lists/create', 'Add new List', array('class' => 'btn btn-success')); ?>

</p>
