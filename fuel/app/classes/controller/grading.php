<?php
class Controller_Grading extends Controller_Template
{

	public function action_index()
	{
		$data['gradings'] = Model_Grading::find('all');
		$this->template->title = "Gradings";
		$this->template->content = View::forge('grading/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('grading');

		if ( ! $data['grading'] = Model_Grading::find($id))
		{
			Session::set_flash('error', 'Could not find grading #'.$id);
			Response::redirect('grading');
		}

		$this->template->title = "Grading";
		$this->template->content = View::forge('grading/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Grading::validate('create');

			if ($val->run())
			{
				$grading = Model_Grading::forge(array(
					'inspection_lot' => Input::post('inspection_lot'),
					'material_id' => Input::post('material_id'),
					'quality_score' => Input::post('quality_score'),
					'valuation_code' => Input::post('valuation_code'),
					'date' => Input::post('date'),
					'plant' => Input::post('plant'),
					'quantity' => Input::post('quantity'),
					'vendor_number' => Input::post('vendor_number'),
				));

				if ($grading and $grading->save())
				{
					Session::set_flash('success', 'Added grading #'.$grading->id.'.');

					Response::redirect('grading');
				}

				else
				{
					Session::set_flash('error', 'Could not save grading.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Gradings";
		$this->template->content = View::forge('grading/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('grading');

		if ( ! $grading = Model_Grading::find($id))
		{
			Session::set_flash('error', 'Could not find grading #'.$id);
			Response::redirect('grading');
		}

		$val = Model_Grading::validate('edit');

		if ($val->run())
		{
			$grading->inspection_lot = Input::post('inspection_lot');
			$grading->material_id = Input::post('material_id');
			$grading->quality_score = Input::post('quality_score');
			$grading->valuation_code = Input::post('valuation_code');
			$grading->date = Input::post('date');
			$grading->plant = Input::post('plant');
			$grading->quantity = Input::post('quantity');
			$grading->vendor_number = Input::post('vendor_number');

			if ($grading->save())
			{
				Session::set_flash('success', 'Updated grading #' . $id);

				Response::redirect('grading');
			}

			else
			{
				Session::set_flash('error', 'Could not update grading #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$grading->inspection_lot = $val->validated('inspection_lot');
				$grading->material_id = $val->validated('material_id');
				$grading->quality_score = $val->validated('quality_score');
				$grading->valuation_code = $val->validated('valuation_code');
				$grading->date = $val->validated('date');
				$grading->plant = $val->validated('plant');
				$grading->quantity = $val->validated('quantity');
				$grading->vendor_number = $val->validated('vendor_number');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('grading', $grading, false);
		}

		$this->template->title = "Gradings";
		$this->template->content = View::forge('grading/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('grading');

		if ($grading = Model_Grading::find($id))
		{
			$grading->delete();

			Session::set_flash('success', 'Deleted grading #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete grading #'.$id);
		}

		Response::redirect('grading');

	}

}
