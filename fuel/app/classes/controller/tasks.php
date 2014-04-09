<?php
class Controller_Tasks extends Controller_Template{

	public function action_index()
	{
		$data['tasks'] = Model_Task::find('all');
		$this->template->title = "Tasks";
		$this->template->content = View::forge('tasks/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('tasks');

		if ( ! $data['task'] = Model_Task::find($id))
		{
			Session::set_flash('error', 'Could not find task #'.$id);
			Response::redirect('tasks');
		}

		$this->template->title = "Task";
		$this->template->content = View::forge('tasks/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Task::validate('create');
			
			if ($val->run())
			{
				$task = Model_Task::forge(array(
					'title' => Input::post('title'),
					'due' => Input::post('due'),
					'location' => Input::post('location'),
					'note' => Input::post('note'),
					'tasklist' => Input::post('tasklist'),
					'user_id' => Input::post('user_id'),
				));

				if ($task and $task->save())
				{
					Session::set_flash('success', 'Added task #'.$task->id.'.');

					Response::redirect('tasks');
				}

				else
				{
					Session::set_flash('error', 'Could not save task.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Tasks";
		$this->template->content = View::forge('tasks/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('tasks');

		if ( ! $task = Model_Task::find($id))
		{
			Session::set_flash('error', 'Could not find task #'.$id);
			Response::redirect('tasks');
		}

		$val = Model_Task::validate('edit');

		if ($val->run())
		{
			$task->title = Input::post('title');
			$task->due = Input::post('due');
			$task->location = Input::post('location');
			$task->note = Input::post('note');
			$task->tasklist = Input::post('tasklist');
			$task->user_id = Input::post('user_id');

			if ($task->save())
			{
				Session::set_flash('success', 'Updated task #' . $id);

				Response::redirect('tasks');
			}

			else
			{
				Session::set_flash('error', 'Could not update task #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$task->title = $val->validated('title');
				$task->due = $val->validated('due');
				$task->location = $val->validated('location');
				$task->note = $val->validated('note');
				$task->tasklist = $val->validated('tasklist');
				$task->user_id = $val->validated('user_id');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('task', $task, false);
		}

		$this->template->title = "Tasks";
		$this->template->content = View::forge('tasks/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('tasks');

		if ($task = Model_Task::find($id))
		{
			$task->delete();

			Session::set_flash('success', 'Deleted task #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete task #'.$id);
		}

		Response::redirect('tasks');

	}


}
