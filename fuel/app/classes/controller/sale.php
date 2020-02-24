<?php
class Controller_Sale extends Controller_Template
{

	public function action_index()
	{
		$data['sales'] = Model_Sale::find('all');
		$this->template->title = "Sales";
		$this->template->content = View::forge('sale/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('sale');

		if ( ! $data['sale'] = Model_Sale::find($id))
		{
			Session::set_flash('error', 'Could not find sale #'.$id);
			Response::redirect('sale');
		}

		$this->template->title = "Sale";
		$this->template->content = View::forge('sale/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Sale::validate('create');

			if ($val->run())
			{
				$sale = Model_Sale::forge(array(
					'productoffer_id' => Input::post('productoffer_id'),
					'bid_id' => Input::post('bid_id'),
					'status' => Input::post('status'),
					'amount' => Input::post('amount'),
				));

				if ($sale and $sale->save())
				{
					Session::set_flash('success', 'Added sale #'.$sale->id.'.');

					Response::redirect('sale');
				}

				else
				{
					Session::set_flash('error', 'Could not save sale.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Sales";
		$this->template->content = View::forge('sale/create');

	}
	public function action_createsale($bid_id, $productoffer_id, $status, $amount)
	{
		
			$sale = Model_Sale::forge()->set(array(
				    'productoffer_id' => $productoffer_id,
				    'bid_id' => $bid_id,
				    'status'=>$status,
				    'amount'=>$amount,
				));
			Debug::dump($sale);die;
			if ($sale and $sale->save())
				{
					

					Response::redirect('dashboard');
				}

				else
				{
					Session::set_flash('error', 'Could not save sale.');
				}

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('sale');

		if ( ! $sale = Model_Sale::find($id))
		{
			Session::set_flash('error', 'Could not find sale #'.$id);
			Response::redirect('sale');
		}

		$val = Model_Sale::validate('edit');

		if ($val->run())
		{
			$sale->productoffer_id = Input::post('productoffer_id');
			$sale->bid_id = Input::post('bid_id');
			$sale->status = Input::post('status');
			$sale->amount = Input::post('amount');

			if ($sale->save())
			{
				Session::set_flash('success', 'Updated sale #' . $id);

				Response::redirect('sale');
			}

			else
			{
				Session::set_flash('error', 'Could not update sale #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$sale->productoffer_id = $val->validated('productoffer_id');
				$sale->bid_id = $val->validated('bid_id');
				$sale->status = $val->validated('status');
				$sale->amount = $val->validated('amount');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('sale', $sale, false);
		}

		$this->template->title = "Sales";
		$this->template->content = View::forge('sale/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('sale');

		if ($sale = Model_Sale::find($id))
		{
			$sale->delete();

			Session::set_flash('success', 'Deleted sale #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete sale #'.$id);
		}

		Response::redirect('sale');

	}

}
