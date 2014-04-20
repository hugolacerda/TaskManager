<div class="row">
	




	<!-- login -->
	<section class="col-sm-4">
		  <div class="widget-container widget_login boxed line-left">
            	<div class="inner">
					<p class="text-center lead">Login</p>
					<?php echo Form::open(array(), array('class' => 'loginform', 'id' => 'loginform')); ?>

						<?php if (isset($_GET['destination'])): ?>
							<?php echo Form::hidden('destination',$_GET['destination']); ?>
						<?php endif; ?>

						<?php if (isset($login_error)): ?>
							<div class="error"><?php echo $login_error; ?></div>
						<?php endif; ?>
						
						<div class="field_text <?php echo ! $val->error('email') ?: 'has-error' ?>">
							<label for="user_login" class="label_title">Email or username:</label>
							<?php echo Form::input('email', Input::post('email'), array('type' => 'text', 'name' => 'log', 'id'=>'user_pass', 'class' => 'form-control required', 'placeholder' => 'Email or Username', 'hidefocus' => 'true', 'style' => 'outline: none; padding-right: 0px; background-attachment: scroll; background-position: 100% 50%; background-repeat: no-repeat no-repeat;', 'autofocus', 'mouseev' => 'true', 'autocomplete' => 'off', 'keyev' => 'true', 'clickev'=> 'true'  )); ?>

							<?php if ($val->error('email')): ?>
								<span class="control-label"><?php echo $val->error('email')->get_message('You must provide a username or email'); ?></sőan>
							<?php endif; ?>
						</div>

						<div class="field_text <?php echo ! $val->error('password') ?: 'has-error' ?>">
							<label for="user_pass" class="label_title">Password:</label>
							<?php echo Form::password('password', null, array('type' => 'text', 'name' => 'pwd', 'id'=>'user_login', 'class' => 'form-control required', 'placeholder' => 'Password', 'hidefocus' => 'true', 'style' => 'outline: none; padding-right: 0px; background-attachment: scroll; background-position: 100% 50%; background-repeat: no-repeat no-repeat;', 'autofocus', 'mouseev' => 'true', 'autocomplete' => 'off', 'keyev' => 'true', 'clickev'=> 'true'  )); ?>

							<?php if ($val->error('password')): ?>
								<span class="control-label"><?php echo $val->error('password')->get_message(':label cannot be blank'); ?></span>
							<?php endif; ?>
						</div>
						<div class="rowRemember clearfix">
                            <div class="forgetmenot input_styled checklist">
                                <div class="rowCheckbox checkbox-red"><div class="custom-checkbox"><input type="checkbox" name="remember" id="remember" value="3" checked="" hidefocus="true" style="outline: none;"><label for="remember" class="checked">Remember me</label></div></div>
                            </div>
                            <input type="hidden" name="redirect_to" value="" hidefocus="true" style="outline: none;">
                            <input type="hidden" name="testcookie" value="1" hidefocus="true" style="outline: none;">
                        </div>
						<div class="rowSubmit">
							<span class="forget_password"><a href="#" hidefocus="true" style="outline: none;">Forgot Password</a></span>
							<span class="btn btn-blue btn-icon-left mySubmit">
								<?php echo Form::submit(array( 'type'=>'submit', 'name'=>'login-submit', 'id'=>'login-submit', 'value'=>'Submit', 'hidefocus'=>'true', 'style'=>'outline: none;')); ?>
							</span>
						</div>

					<?php echo Form::close(); ?>
			</div>
		</div>
	</section>

	<aside class="col-sm-3">
		<div class="title_box"><div class="title_box_inner"><span class="arrow arrow-up" data-rel="3"></span><span class="arrow arrow-down" data-rel="3"></span><h2 class="text-center">Or</h2></div></div>
	</aside>


	<!-- create new user -->
	<section class="col-sm-4">
		<div class="widget-container widget_login boxed line-left">
	        <div class="inner">
	            <p class="text-center lead">Create a New User</p>

				<?php echo Form::open(array("action" => "user/register", 'id'=>'loginform', 'class'=>'loginform')); ?>

					<?php if (isset($_POST['destination'])): ?>
						<?php echo Form::hidden('destination',$_POST['destination']); ?>
					<?php endif; ?>

					<div class="field_text <?php echo ! $val->error('username') ?: 'has-error' ?>">
						<label for="user_login" class="label_title">Username</label>
						<?php echo Form::input('username', Input::post('username'), array('type'=>'text', 'name'=>'log', 'id'=>'user_login', 'placeholder'=>'Email', 'class'=>'required', 'hidefocus'=>'true', 'style'=>'outline: none; padding-right: 0px; background-attachment: scroll; background-position: 100% 50%; background-repeat: no-repeat no-repeat;', 'mouseev'=>'true', 'autocomplete'=>'off', 'keyev'=>'true', 'clickev'=>'true')); ?>

						<?php if ($val->error('username')): ?>
							<span class="control-label"><?php echo $val->error('username')->get_message('You must provide a username'); ?></span>
						<?php endif; ?>
					</div>


					<div class="field_text <?php echo ! $val->error('email2') ?: 'has-error' ?>">
						<label for="user_pass" class="label_title">Password</label>
						<?php echo Form::input('email2', Input::post('email2'), array('type'=>'text', 'name'=>'log', 'id'=>'user_login', 'placeholder'=>'Password', 'class'=>'required', 'hidefocus'=>'true', 'style'=>'outline: none; padding-right: 0px; background-attachment: scroll; background-position: 100% 50%; background-repeat: no-repeat no-repeat;', 'mouseev'=>'true', 'autocomplete'=>'off', 'keyev'=>'true', 'clickev'=>'true')); ?>

						<?php if ($val->error('email2')): ?>
							<span class="control-label"><?php echo $val->error('email2')->get_message('You must provide a username or email2'); ?></span>
						<?php endif; ?>
					</div>

					<div class="form-group <?php echo ! $val->error('password2') ?: 'has-error' ?>">
						<label for="user_pass" class="label_title">Retype Password</label>
						<?php echo Form::password('password2', null, array('type'=>'text', 'name'=>'log', 'id'=>'user_login', 'placeholder'=>'Retype Password', 'class'=>'required', 'hidefocus'=>'true', 'style'=>'outline: none; padding-right: 0px; background-attachment: scroll; background-position: 100% 50%; background-repeat: no-repeat no-repeat;', 'mouseev'=>'true', 'autocomplete'=>'off', 'keyev'=>'true', 'clickev'=>'true')); ?>

						<?php if ($val->error('password2')): ?>
							<span class="control-label"><?php echo $val->error('password2')->get_message(':label cannot be blank'); ?></span>
						<?php endif; ?>
					</div>

					 <div class="rowRemember clearfix">
                        <div class="forgetmenot input_styled checklist">
                            <div class="rowCheckbox checkbox-red"><div class="custom-checkbox"><input type="checkbox" name="remember" id="remember" value="3" checked="" hidefocus="true" style="outline: none;"><label for="remember" class="checked">Remember me</label></div></div>
                        </div>
                        <input type="hidden" name="redirect_to" value="" hidefocus="true" style="outline: none;">
                        <input type="hidden" name="testcookie" value="1" hidefocus="true" style="outline: none;">
                    </div>

					<div class="rowSubmit">
						<span class="forget_password"><a href="#" hidefocus="true" style="outline: none;">Forgot Password</a></span>
						<span class="btn btn-blue btn-icon-left"><?php echo Form::submit(array( 'type'=>'submit', 'name'=>'login-submit', 'id'=>'login-submit', 'value'=>'Submit', 'hidefocus'=>'true', 'style'=>'outline: none;')); ?></span>
					</div>

				<?php echo Form::close(); ?>

			</div>
        </div>

    </section> <!-- create user -->

</div>

