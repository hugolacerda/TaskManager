<?php

class Model_User extends \Orm\Model
{

	protected static $_table_name = 'users';
	protected static $_has_many = array('tasks', 'lists');
	protected static $_belongs_to = array('user');
	
	


	// protected static $_primary_key = array('id'); 

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
}
