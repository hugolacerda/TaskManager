<?php


class Model_List extends \Orm\Model
{

	
	// A list is created by one user
	protected static $_belongs_to = array('user');

	
	// list can have multiple tasks
	// protected static $_has_many = array('tasks');


	protected static $_properties = array(
		'id',
		'title',
		'user_id',
		'created_at',
		'updated_at',
		
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

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('title', 'Title', 'required|max_length[255]');
		// $val->add_field('user_id', 'User Id', 'required|valid_string[numeric]');


		return $val;
	}

}
