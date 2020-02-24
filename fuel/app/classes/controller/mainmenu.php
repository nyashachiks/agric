<?php
class Controller_Mainmenu extends Controller_Base
{
public function before()
{
	parent::before();
	View::set_global('view_legend','Main menu');
}
	public function action_index()
	{
		$data['mainmenus'] = Model_Mainmenu::find('all');
		$this->template->title = "Mainmenus";
		$this->template->content = View::forge('mainmenu/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('mainmenu');

		if ( ! $data['mainmenu'] = Model_Mainmenu::find($id))
		{
			Session::set_flash('error', 'Could not find mainmenu #'.$id);
			Response::redirect('mainmenu');
		}

		$this->template->title = "Mainmenu";
		$this->template->content = View::forge('mainmenu/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Mainmenu::validate('create');

			if ($val->run())
			{
				$mainmenu = Model_Mainmenu::forge(array(
					'name' => Input::post('name'),
					'icon' => Input::post('icon',''),
					'url' => Input::post('url'),
					'visible' => Input::post('visible'),
					'aligned'=>Input::post('aligned'),
					'position'=>0,
				));

				if ($mainmenu and $mainmenu->save())
				{
					Session::set_flash('success', 'Added mainmenu #'.$mainmenu->id.'.');

					Response::redirect('mainmenu');
				}

				else
				{
					Session::set_flash('error', 'Could not save mainmenu.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Mainmenus";
		$this->template->content = View::forge('mainmenu/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('mainmenu');

		if ( ! $mainmenu = Model_Mainmenu::find($id))
		{
			Session::set_flash('error', 'Could not find mainmenu #'.$id);
			Response::redirect('mainmenu');
		}

		$val = Model_Mainmenu::validate('edit');

		if ($val->run())
		{
			$mainmenu->name = Input::post('name');
			$mainmenu->icon = Input::post('icon');
			$mainmenu->url = Input::post('url');
			$mainmenu->visible = Input::post('visible');

			if ($mainmenu->save())
			{
				Session::set_flash('success', 'Updated mainmenu #' . $id);

				Response::redirect('mainmenu');
			}

			else
			{
				Session::set_flash('error', 'Could not update mainmenu #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$mainmenu->name = $val->validated('name');
				$mainmenu->url = $val->validated('url');
				$mainmenu->position = $val->validated('position');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('mainmenu', $mainmenu, false);
		}

		$this->template->title = "Mainmenus";
		$this->template->content = View::forge('mainmenu/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('mainmenu');

		if ($mainmenu = Model_Mainmenu::find($id))
		{
			$mainmenu->delete();

			Session::set_flash('success', 'Deleted mainmenu #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete mainmenu #'.$id);
		}

		Response::redirect('mainmenu');

	}
	public function action_Arrange($arrange)
	{
		//$data['bids'] = Model_Bid::find('all');
		$data['menu']=Model_Mainmenu::query()->select('name','id')->where('aligned',$arrange)
		->order_by('position','asc')->get();
		$data['url']=Uri::create('mainmenu/position');
		//Debug::dump($data);die;
		$this->template->title = "Bids";
		$this->template->content = View::forge('mainmenu/arrange',$data);

	}
	public function action_position()
	{
		$ArrId=explode('|',Input::post('info'));
		$id=$ArrId[1];
		//var_dump($ArrId);die;
		
		$mainmenu=Model_Mainmenu::find($id);
		$mainmenu->position=Input::post('count');// new position of menu item;
		$mainmenu->save();
		echo 1;die;
		
	}
}
