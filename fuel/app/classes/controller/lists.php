<?php
class Controller_Lists extends Controller_Base{



	public function action_index()
	{
		var_dump($this->current_user->id);
		$data['lists'] = Model_List::find_all_by_user_id($this->current_user->id);

		// $data['lists'] = Model_List::find('all');
		//List and Tasks on the same page
		$this->template->title = "Lists";
		$this->template->content = View::forge('lists/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('lists');

		if ( ! $data['list'] = Model_List::find($id))
		{
			Session::set_flash('error', 'Could not find list #'.$id);
			Response::redirect('lists');
		}

		$this->template->title = "List";
		$this->template->content = View::forge('lists/view', $data);

	}

	public function action_create($id =  null)
	{
		$view = View::forge('lists/create');

		if (Input::method() == 'POST')
		{
			$val = Model_List::validate('create');
			
			if ($val->run())
			{
				$list = Model_List::forge(array(
					'title' => Input::post('title'),
					'user_id' => $this->current_user->id,
				));

				if ($list and $list->save())
				{
					Session::set_flash('success', 'Added list #'.$list->id.'.');

					Response::redirect('lists');
				}

				else
				{
					Session::set_flash('error', 'Could not save list.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}
		$view->set_global('list', Arr::assoc_to_keyval(Model_List::find('all'), 'id', 'title'));
		$this->template->title = "Lists";
		$this->template->content = View::forge('lists/create');

	}

	public function action_edit($id = null)
	{
		// is_null($id) and Response::redirect('lists');

		// if ( ! $list = Model_List::find($id))
		// {
		// 	Session::set_flash('error', 'Could not find list #'.$id);
		// 	Response::redirect('lists');
		// }

		$view = View::forge('admin/posts/edit');

		$post = Model_List::find($id);

		$val = Model_List::validate('edit');

		if ($val->run())
		{
			$list->title = Input::post('title');
			$list->user_id = $this->current_user->id;

			if ($list->save())
			{
				Session::set_flash('success', e('Updated list #' . $id));

				Response::redirect('lists');
			}

			else
			{
				Session::set_flash('error', e('Could not update list #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$list->title = $val->validated('title');
				$list->user_id = $this->current_user->id;

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('list', $list, false);
		}

		$view->set_global('users', Arr::assoc_to_keyval(Model_User::find('all'), 'id', 'username'));

		$this->template->title = "Lists";
		$this->template->content = View::forge('lists/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('lists');

		if ($list = Model_List::find($id))
		{
			$list->delete();

			Session::set_flash('success', e('Deleted list #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete list #'.$id));
		}

		Response::redirect('lists');

	}


}
