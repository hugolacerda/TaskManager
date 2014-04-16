<?php

class Controller_User extends Controller_Base
{
	public $template = 'user/template';

	public function before()
	{
		parent::before();

		if (Request::active()->controller !== 'Controller_user' or ! in_array(Request::active()->action, array('login', 'logout')))
		{
			if (Auth::check())
			{
				$user_group_id = Config::get('auth.driver', 'Simpleauth') == 'Ormauth' ? 6 : 100;
				if ( ! Auth::member($user_group_id))
				{
					Session::set_flash('error', e('You don\'t have access to the user panel'));
					// Response::redirect('/');
				}
			}
			else
			{
				// Response::redirect('user/login');
				// echo "this is the user";
			}
		}
	}


	public function action_login()
	{
		// Already logged in
		Auth::check() and Response::redirect('user');

		$val = Validation::forge();

		if (Input::method() == 'POST')
		{
			$val->add('email', 'Email or Username')
			    ->add_rule('required');
			$val->add('password', 'Password')
			    ->add_rule('required');

			if ($val->run())
			{
				$auth = Auth::instance();

				// check the credentials. This assumes that you have the previous table created
				if (Auth::check() or $auth->login(Input::post('email'), Input::post('password')))
				{
					// credentials ok, go right in
					if (Config::get('auth.driver', 'Simpleauth') == 'Ormauth')
					{
						$current_user = Model\Auth_User::find_by_username(Auth::get_screen_name());
					}
					else
					{
						$current_user = Model_User::find_by_username(Auth::get_screen_name());
					}
					Session::set_flash('success', ('Welcome, '.$current_user->username));
					Response::redirect('user');
				}
				else
				{
					$this->template->set_global('login_error', 'Fail');
				}
			}
		}

		$this->template->title = 'Login';
		$this->template->content = View::forge('user/login', array('val' => $val), false);
	}

	public function action_register()
	{	
			
				///auth example
		$val = Validation::forge();
		
		if (\Input::method() == 'POST')
	    {
	    	$val->add('username', 'Username')
			    ->add_rule('required');
	        $val->add('email2', 'Email or Username')
			    ->add_rule('required');
			$val->add('password2', 'Password')
			    ->add_rule('required');

			if (! $val->run())
	        {
	        	$val->error();
	        	redirect('user/login');
	        }

            try
            {
            	$auth = Auth::instance();
                // call Auth to create this user

      		 
				
				

                // if a user was created succesfully
                if ($auth->create_user($val->validated('email2'), $val->validated('password2'), $val->validated('email2')))
                {
                	
                	$auth->login($val->validated('email2'), $val->validated('password2'));
                 
					if (Config::get('auth.driver', 'Simpleauth') == 'Ormauth')
					{
						$current_user = Model\Auth_User::find_by_username(Auth::get_screen_name());
					}
					else
					{
						$current_user = Model_User::find_by_username(Auth::get_screen_name());
					}
					Session::set_flash('success', ('Welcome, '.$current_user->username));
					Response::redirect('user');


                }
                else
                {
                    // oops, creating a new user failed?
                    // \Messages::error(__('login.account-creation-failed'));
                    $this->template->set_global('login_error', 'Fail');
                }
            }

            // catch exceptions from the create_user() call
            catch (\SimpleUserUpdateException $e)
            {
            	throw $e;

                // duplicate email address
                if ($e->getCode() == 2)
                {
                    \Messages::error(__('login.email-already-exists'));
                }

                // duplicate username
                elseif ($e->getCode() == 3)
                {
                    \Messages::error(__('login.username-already-exists'));
                }

                // this can't happen, but you'll never know...
                else
                {
                    \Messages::error($e->getMessage());
                }
            }
	       
	    }

		$this->template->title = 'User Created';
		$this->template->content = View::forge('user/dashboard', array('val' => $val), false);

	}








	

	/**
	 * The logout action.
	 *
	 * @access  public
	 * @return  void
	 */
	public function action_logout()
	{
		Auth::logout();
		Response::redirect('user');
	}

	/**
	 * The index action.
	 *
	 * @access  public
	 * @return  void
	 */
	public function action_index()
	{
		$this->template->title = 'Dashboard';
		$this->template->content = View::forge('user/dashboard');
	}

}

/* End of file user.php */
