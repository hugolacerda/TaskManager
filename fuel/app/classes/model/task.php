<?php

class Model_Task extends \Orm\Model
{

	// A post is created by one user
	protected static $_belongs_to = array('lists', 'user');

	
	// user can post multiple blogs
	protected static $_has_many = array('lists');



	protected static $_properties = array(
		'id',
		'title',
		'due',
		'location',
		'note',
		'list_id',
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
		$val->add_field('due', 'Due', 'required');
		$val->add_field('location', 'Location', 'required');
		$val->add_field('note', 'Note', 'required');
		$val->add_field('list_id', 'Belongs to', 'required|valid_string[numeric]');
		

		return $val;
	}

}
