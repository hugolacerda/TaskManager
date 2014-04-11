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
					Session::set_flash('success', e('Welcome, '.$current_user->username));
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

	//register

	public function action_register()
	{
	       $auth = Auth::instance();
		    // $view = View::forge('users/register');
		    $form = Fieldset::forge('register');
		    Model_User::register($form);
		 
		    if (Input::post())
		    {
		        $form->repopulate();
		        $result = Model_User::validate_registration($form, $auth);
		        if ($result['e_found'])
		        {
		            $view->set('errors', $result['errors'], false);
		        }
		        else
		        {
		            Session::set_flash('success', 'User created.');
		            Response::redirect('./');
		        }
		    }

		if (Input::post())
		    {
		        $form->repopulate();
		        $result = Model_User::validate_registration($form, $auth);
		    }
		 
	    $view->set('reg', $form->build(), false);
	    $this->template->title = 'User &raquo; Register';
	    $this->template->content = $view;
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
