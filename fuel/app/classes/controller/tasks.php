<?php
class Controller_Tasks extends Controller_Template{

	public function action_index()
	{
		$data['tasks'] = Model_Task::find_all_by_user_id($this->current_user->id);
		$this->template->title = "Tasks";
		$this->template->content = View::forge('user/tasks/index', $data);

	}

	public function action_view($id = null)
	{	
		//Check to see if there's any Taks
		is_null($id) and Response::redirect('tasks');

		if ( ! $data['task'] = Model_Task::find($id))
		{
			Session::set_flash('error', 'Could not find task #'.$id);
			Response::redirect('tasks');
		}
		// $data['tasks'] = Model_Task::find($id);
		$this->template->title = "Task";
		$this->template->content = View::forge('user/tasks/view', $data);

	}

	public function action_create()
	{

		$view = View::forge('user/tasks/create');

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
					'list_id' => Input::post('list_id'),
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

		// $view->set_global('task', Arr::assoc_to_keyval(Model_Task::find('all'), 'id', 'username'));
		$this->template->title = "Tasks";
		$this->template->content = $view;

	}

	public function action_edit($id = null)
	{

		// $view = View::forge('user/tasks/edit');

		// $task = Model_Task::find($id);
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
			$task->list_id = Input::post('list_id');
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
				$task->list_id = $val->validated('list_id');
				$task->user_id = $val->validated('user_id');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('task', $task, false);
		}

		$this->template->title = "Tasks";
		$this->template->content = View::forge('user/tasks/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('user/tasks');

		if ($task = Model_Task::find($id))
		{
			$task->delete();

			Session::set_flash('success', 'Deleted task #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete task #'.$id);
		}

		Response::redirect('user/tasks');


	}


}
