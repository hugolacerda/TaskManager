<?php

namespace Fuel\Migrations;

class Create_tasks
{
	public function up()
	{
		\DBUtil::create_table('tasks', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'title' => array('constraint' => 255, 'type' => 'varchar'),
			'due' => array('type' => 'date'),
			'location' => array('type' => 'text'),
			'note' => array('type' => 'text'),
			'taskList' => array('constraint' => 255, 'type' => 'varchar'),
			'user_id' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('tasks');
	}
}