<div class="row">
	
	<!-- login -->
	<div class="col-md-3">
		<?php echo Form::open(array()); ?>

			<?php if (isset($_GET['destination'])): ?>
				<?php echo Form::hidden('destination',$_GET['destination']); ?>
			<?php endif; ?>

			<?php if (isset($login_error)): ?>
				<div class="error"><?php echo $login_error; ?></div>
			<?php endif; ?>

			<div class="form-group <?php echo ! $val->error('email') ?: 'has-error' ?>">
				<label for="email">Email or username:</label>
				<?php echo Form::input('email', Input::post('email'), array('class' => 'form-control', 'placeholder' => 'Email or username', 'autofocus')); ?>

				<?php if ($val->error('email')): ?>
					<span class="control-label"><?php echo $val->error('email')->get_message('You must provide a username or email'); ?></sőan>
				<?php endif; ?>
			</div>

			<div class="form-group <?php echo ! $val->error('password') ?: 'has-error' ?>">
				<label for="password">Password:</label>
				<?php echo Form::password('password', null, array('class' => 'form-control', 'placeholder' => 'Password')); ?>

				<?php if ($val->error('password')): ?>
					<span class="control-label"><?php echo $val->error('password')->get_message(':label cannot be blank'); ?></span>
				<?php endif; ?>
			</div>

			<div class="actions">
				<?php echo Form::submit(array('value'=>'Login', 'name'=>'submit', 'class' => 'btn btn-lg btn-primary btn-block')); ?>
			</div>

		<?php echo Form::close(); ?>
	</div>



	<!-- create new user -->
	<div class="col-md-3">
		<?php echo Form::open(array("action" => "user/register")); ?>

			<?php if (isset($_POST['destination'])): ?>
				<?php echo Form::hidden('destination',$_POST['destination']); ?>
			<?php endif; ?>

			

			<div class="form-group <?php echo ! $val->error('email2') ?: 'has-error' ?>">
				<label for="email2">email2 or username:</label>
				<?php echo Form::input('email2', Input::post('email2'), array('class' => 'form-control', 'placeholder' => 'email2 or username', 'autofocus')); ?>

				<?php if ($val->error('email2')): ?>
					<span class="control-label"><?php echo $val->error('email2')->get_message('You must provide a username or email2'); ?></sőan>
				<?php endif; ?>
			</div>

			<div class="form-group <?php echo ! $val->error('password2') ?: 'has-error' ?>">
				<label for="password2">Password:</label>
				<?php echo Form::password('password2', null, array('class' => 'form-control', 'placeholder' => 'Password')); ?>

				<?php if ($val->error('password2')): ?>
					<span class="control-label"><?php echo $val->error('password2')->get_message(':label cannot be blank'); ?></span>
				<?php endif; ?>
			</div>

			<div class="actions">
				<?php echo Form::submit(array('value'=>'Submit', 'name'=>'submit', 'class' => 'btn btn-lg btn-primary btn-block')); ?>
			</div>

		<?php echo Form::close(); ?>
	</div>
</div>

