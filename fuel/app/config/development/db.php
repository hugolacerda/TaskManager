<?php
/**
 * The development database settings. These get merged with the global settings.
 */

return array(
	'default' => array(
		'connection'  => array(
			'dsn'        => 'mysql:host=127.0.0.1;dbname=taskManager',
			'username'   => 'root',
			'password'   => 'root',
			//$ oil generate user tasks title:string due:date location:text note:text taskList:string user_id:int
			//oil generate admin posts title:string slug:string summary:text body:text user_id:int
		),
	),
);