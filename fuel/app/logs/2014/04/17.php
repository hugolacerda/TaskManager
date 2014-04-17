<?php defined('COREPATH') or exit('No direct script access allowed'); ?>

ERROR - 2014-04-17 00:46:45 --> Error - Property "task_id" not found for Model_List. in /Users/Kalrach/Sites/TaskManager/fuel/packages/orm/classes/model.php on line 1134
ERROR - 2014-04-17 01:33:28 --> Notice - Undefined variable: data in /Users/Kalrach/Sites/TaskManager/fuel/app/views/lists/_form.php on line 24
ERROR - 2014-04-17 01:34:02 --> Compile Error - Cannot redeclare Model_List::$_belongs_to in /Users/Kalrach/Sites/TaskManager/fuel/app/classes/model/list.php on line 10
ERROR - 2014-04-17 01:34:29 --> Error - SQLSTATE[42S22]: Column not found: 1054 Unknown column 't0.tasks_id' in 'field list' with query: "SELECT `t0`.`id` AS `t0_c0`, `t0`.`title` AS `t0_c1`, `t0`.`tasks_id` AS `t0_c2`, `t0`.`created_at` AS `t0_c3`, `t0`.`updated_at` AS `t0_c4` FROM `lists` AS `t0`" in /Users/Kalrach/Sites/TaskManager/fuel/core/classes/database/pdo/connection.php on line 234
ERROR - 2014-04-17 01:34:56 --> Error - Property "task_id" not found for Model_List. in /Users/Kalrach/Sites/TaskManager/fuel/packages/orm/classes/model.php on line 1134
ERROR - 2014-04-17 01:37:00 --> Error - SQLSTATE[42S22]: Column not found: 1054 Unknown column 't0.task_id' in 'field list' with query: "SELECT `t0`.`id` AS `t0_c0`, `t0`.`title` AS `t0_c1`, `t0`.`task_id` AS `t0_c2`, `t0`.`created_at` AS `t0_c3`, `t0`.`updated_at` AS `t0_c4` FROM `lists` AS `t0`" in /Users/Kalrach/Sites/TaskManager/fuel/core/classes/database/pdo/connection.php on line 234
ERROR - 2014-04-17 01:37:35 --> Notice - Undefined variable: data in /Users/Kalrach/Sites/TaskManager/fuel/app/views/lists/_form.php on line 24
ERROR - 2014-04-17 01:38:00 --> Notice - Undefined variable: tasks in /Users/Kalrach/Sites/TaskManager/fuel/app/views/lists/_form.php on line 24
