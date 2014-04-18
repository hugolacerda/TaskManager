<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Title', 'title', array('class'=>'control-label')); ?>

				<?php echo Form::input('title', Input::post('title', isset($task) ? $task->title : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Title')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Due', 'due', array('class'=>'control-label')); ?>

				<?php echo Form::input('due', Input::post('due', isset($task) ? $task->due : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Due')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Location', 'location', array('class'=>'control-label')); ?>

				<?php echo Form::textarea('location', Input::post('location', isset($task) ? $task->location : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder'=>'Location')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Note', 'note', array('class'=>'control-label')); ?>

				<?php echo Form::textarea('note', Input::post('note', isset($task) ? $task->note : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder'=>'Note')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Tasklist', 'tasklist', array('class'=>'control-label')); ?>

				<?php echo Form::input('tasklist', Input::post('tasklist', isset($task) ? $task->tasklist : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Tasklist')); ?>

			<div class="clearfix">
			    <?php echo Form::label('Belongs to', 'list_id', array('class'=>'control-label')); ?>
			 
			    <div class="input">
			
			    <?php echo Form::select('list_id', Input::post('list_id', isset($task) ? $task->list_id : $list->id), $list, array('class' => 'span6')); ?>
		    </div>

		</div>

		</div>
		<div class="form-group">
			<?php echo Form::label('User id', 'user_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('user_id', Input::post('user_id', isset($task) ? $task->user_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'User id')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		
		</div>
	</fieldset>
<?php echo Form::close(); ?>