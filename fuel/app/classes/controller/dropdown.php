<?php
class Controller_Dropdown extends Controller_Base
{

	public function before()
	{
		parent::before();
		View::set_global('view_legend','Dropdown');
	}
	
	public function action_index($id=NULL)
	{
		is_null($id) and Response::redirect('mainmenu');
		$data['mainmenu'] = Model_Mainmenu::find($id); //getting mainmenu and will use id to get drop down
		$data['dropdowns']=$data['mainmenu']->dropdowns;
		$this->template->title = "Dropdowns";
		$this->template->content = View::forge('dropdown/index', $data);

	}
	public function action_Arrange($id=null)
	{
		//$data['bids'] = Model_Bid::find('all');
		$data['menu']=Model_Dropdown::query()->select('name','id')->where('mainmenu_id',$id)
		->order_by('position','asc')->get();
		//Debug::dump($data);die;
		//$data['mainmenu'] = Model_Mainmenu::find($id); //getting mainmenu and will use id to get drop down
		//$data['dropdowns']=$data['mainmenu']->dropdowns;
		$data['url']=Uri::create('dropdown/position');
		
		$this->template->title = "Bids";
		$this->template->content = View::forge('mainmenu/arrange',$data);

	}
	public function action_position()
	{
		$ArrId=explode('|',Input::post('info'));
		$id=$ArrId[1];
		//var_dump($ArrId);die;
		
		$mainmenu=Model_Dropdown::find($id);
		$mainmenu->position=Input::post('count');// new position of menu item;
		$mainmenu->save();
		echo 1;die;
		
	}
	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('dropdown');

		if ( ! $data['dropdown'] = Model_Dropdown::find($id))
		{
			Session::set_flash('error', 'Could not find dropdown #'.$id);
			Response::redirect('dropdown');
		}

		$this->template->title = "Dropdown";
		$this->template->content = View::forge('dropdown/view', $data);

	}

	public function action_create($id=NULL)
	{
		is_null($id) and Response::redirect('mainmenu');
		if (Input::method() == 'POST')
		{
			$val = Model_Dropdown::validate('create');

			if ($val->run())
			{
				$dropdown = Model_Dropdown::forge(array(
					'name' => Input::post('name'),
					'url' => Input::post('url'),
					'mainmenu_id'=>Input::post('mainmenu'),
					'visible' => Input::post('visible'),
					'position'=>0,
				));

				if ($dropdown and $dropdown->save())
				{
					Session::set_flash('success', 'Added dropdown #'.$dropdown->id.'.');

					Response::redirect('dropdown');
				}

				else
				{
					Session::set_flash('error', 'Could not save dropdown.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}
		$this->template->set_global('mainmenu_id',$id);
		$this->template->title = "Dropdowns";
		$this->template->content = View::forge('dropdown/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('dropdown');

		if ( ! $dropdown = Model_Dropdown::find($id))
		{
			Session::set_flash('error', 'Could not find dropdown #'.$id);
			Response::redirect('dropdown');
		}

		$val = Model_Dropdown::validate('edit');

		if ($val->run())
		{
			$dropdown->name = Input::post('name');
			$dropdown->url = Input::post('url');
			$dropdown->visible = Input::post('visible');

			if ($dropdown->save())
			{
				Session::set_flash('success', 'Updated dropdown #' . $id);

				Response::redirect('dropdown');
			}

			else
			{
				Session::set_flash('error', 'Could not update dropdown #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$dropdown->name = $val->validated('name');
				$dropdown->url = $val->validated('url');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('dropdown', $dropdown, false);
		}
		$this->template->set_global('mainmenu_id',$id);
		$this->template->title = "Dropdowns";
		$this->template->content = View::forge('dropdown/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('dropdown');

		if ($dropdown = Model_Dropdown::find($id))
		{
			$dropdown->delete();

			Session::set_flash('success', 'Deleted dropdown #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete dropdown #'.$id);
		}

		Response::redirect('dropdown');

	}

}
