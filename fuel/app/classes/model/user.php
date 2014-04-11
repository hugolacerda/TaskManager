<?php

class Model_User extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'username',
		'password',
		'group',
		'last_login',
		'login_hash',
		'profile_fields',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_update'),
			'mysql_timestamp' => false,
		),
	);

 	public static function register(Fieldset $form)
    {
    	$form->add('username', 'Username:')->add_rule('required');
	    $form->add('password', 'Choose Password:', array('type'=>'password'))->add_rule('required');
	    $form->add('password2', 'Re-type Password:', array('type' => 'password'))->add_rule('required');
	    $form->add('submit', ' ', array('type'=>'submit', 'value' => 'Register'));
	    return $form;
    }

    public static function validate_registration(Fieldset $form, $auth)
	{
	    $form->field('password')->add_rule('match_value', $form->field('password2')->get_attribute('value'));
	    $val = $form->validation();
	    $val->set_message('required', 'The field :field is required.');
	    $val->set_message('match_value', 'The passwords must match.');
	 
	    if ($val->run())
	    {
	    	$username = $form->field('username')->get_attribute('value');
	        $password = $form->field('password')->get_attribute('value');
	        $email = $form->field('email')->get_attribute('value');
	        //add user to database
	        try
	        {
	            $user = $auth->create_user($username, $password, $email);
	        }
	        //catch any errors via exception
	        catch (Exception $e)
	        {
	            $error = $e->getMessage();
	        }
	        //if pass login as user
	        if (isset($user))
	        {
	            $auth->login($username, $password);
	        }

	        //return errors and unordered list if login fails
	        else
	        {
	            if (isset($error))
	            {
	                $li = $error;
	            }
	            else
	            {
	                $li = 'Something went wrong with creating the user!';
	            }
	            $errors = Html::ul(array($li));
	            return array('e_found' => true, 'errors' => $errors);
	        }
	    }
	    else
	    {
	        $errors = $val->show_errors();
	        return array('e_found' => true, 'errors' => $errors);
	    }
	}
	
	protected static $_table_name = 'users';

}
