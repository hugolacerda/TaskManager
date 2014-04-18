<?php echo Form::open(array("class"=>"form-horizontal")); ?>
	
	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Title', 'title', array('class'=>'control-label')); ?>

				<?php echo Form::input('title', null, array('class' => 'col-md-4 form-control', 'placeholder'=>'Title')); ?>

		</div>
		
		<!-- <div class="form-group">
			<?php //echo Form::label('Task id', 'task_id', array('class'=>'control-label')); ?>

				<?php //echo Form::input('task_id', Input::post('task_id', isset($list) ? $list->task_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Task id')); ?>

		</div> -->

		<!-- <div class="form-group">

		<div class="clearfix">
		    <?php //echo Form::label('Task id', 'task_id', array('class'=>'control-label')); ?>
		 
		    <div class="input">
		
		        <?php //echo Form::select('task_id', Input::post('task_id', isset($list) ? $list->task_id : $current_user->id), $users, array('class' => 'span6')); ?>
		 
		    </div>

		</div>

		</div> -->
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>
		</div>
	</fieldset>
<?php echo Form::close(); ?>