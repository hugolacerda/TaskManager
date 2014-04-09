<?php
use Orm\Model;

class Model_Task extends Model
{
	protected static $_properties = array(
		'id',
		'title',
		'due',
		'location',
		'note',
		'tasklist',
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
		$val->add_field('tasklist', 'Tasklist', 'required|max_length[255]');
		$val->add_field('user_id', 'User Id', 'required|valid_string[numeric]');

		return $val;
	}

}
