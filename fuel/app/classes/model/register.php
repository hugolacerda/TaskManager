<?php
 
    class Model_Register extends \Orm\Model
    {
        protected static $_properties = array(
            'id',
            'username',
            'email',
            'password',
            'group',
            'last_login',
            'login_hash',
            'profile_fields',
            'created_at',
            'updated_at'
        );
 
        protected static $_observers = array(
            'Orm\Observer_CreatedAt' => array(
                'events' => array('before_insert'),
                'mysql_timestamp' => false,
            ),
            'Orm\Observer_UpdatedAt' => array(
                'events' => array('before_save'),
                'mysql_timestamp' => false,
            ),
        );
 
        public static function register(Fieldset $form)
        {
        	$form->add('username', 'Username:')->add_rule('required');
            $form->add('email2', 'Email:')->add_rule('required');
		    $form->add('password2', 'Choose Password:', array('type'=>'password'))->add_rule('required');
		    $form->add('submit', ' ', array('type'=>'submit', 'value' => 'Register'));
		    return $form;
        }
    }