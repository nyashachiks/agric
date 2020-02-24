<?php
class Controller_Bid extends Controller_Template
{

	public function action_index()
	{
		$data['bids'] = Model_Bid::find('all');
		$this->template->title = "Bids";
		$this->template->content = View::forge('bid/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('bid');

		if ( ! $data['bid'] = Model_Bid::find($id))
		{
			Session::set_flash('error', 'Could not find bid #'.$id);
			Response::redirect('bid');
		}

		$this->template->title = "Bid";
		$this->template->content = View::forge('bid/view', $data);

	}
	
	public function action_makebid($id)
	{
		
		
		$type='bid';
		Session::set('type','bid');
		$this->template->title = "Make a bid";
		Response::redirect('bid/create/'.$id);
	}
	
	public function action_buy($id)
	{
		
		
		$type='straight';
		Session::set('type',$type);
		$this->template->title = "Buy";
		Response::redirect('bid/create/'.$id);
	}
	

	public function action_create($id=NULL)
	{
		$productoffer='';
		$sale='';
		
		if($id!=NULL)
		{
			$productoffer = Model_Productoffer::find($id);
		}
		if (Input::method() == 'POST')
		{
			$val = Model_Bid::validate('create');

			if ($val->run())
			{
				$bid = Model_Bid::forge(array(
					'productoffer_id' => Input::post('productoffer_id'),
					'buyer_id' => Input::post('buyer_id'),
					'price' => Input::post('price'),
					'quantity' => Input::post('quantity'),
					'total' => Input::post('total'),
					'type' => Input::post('type'),
				));

				if ($bid and $bid->save())
				{
					$productoffer->count=$productoffer->count +1;
					$productoffer->quantity_left= $productoffer->quantity_left-$bid->quantity;
					// Update a productoffer
					$productoffer->save();
					//Session::set_flash('success', 'Added bid ');
					$sale = Model_Sale::forge()->set(array(
				    'productoffer_id' => $productoffer->id,
				    'bid_id' => $bid->id,
				    'status'=>'open',
				    'amount'=>$bid->total,
						));
					
						if ($sale and $sale->save())
						{
							Session::set('sale',$sale);
							Response::redirect('transaction/create');
						}

						else
						{
							Session::set_flash('error', 'Could not save sale.');
						}
				}

				else
				{
					Session::set_flash('error', 'Could not save bid.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}
		$this->template->set_global('productoffer',$productoffer);
		$this->template->title = "Bids";
		$this->template->content = View::forge('bid/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('bid');

		if ( ! $bid = Model_Bid::find($id))
		{
			Session::set_flash('error', 'Could not find bid #'.$id);
			Response::redirect('bid');
		}

		$val = Model_Bid::validate('edit');

		if ($val->run())
		{
			$bid->productoffer_id = Input::post('productoffer_id');
			$bid->buyer_id = Input::post('buyer_id');
			$bid->price = Input::post('price');
			$bid->quantity = Input::post('quantity');
			$bid->total = Input::post('total');
			$bid->type = Input::post('type');

			if ($bid->save())
			{
				Session::set_flash('success', 'Updated bid #' . $id);

				Response::redirect('bid');
			}

			else
			{
				Session::set_flash('error', 'Could not update bid #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$bid->productoffer_id = $val->validated('productoffer_id');
				$bid->buyer_id = $val->validated('buyer_id');
				$bid->price = $val->validated('price');
				$bid->quantity = $val->validated('quantity');
				$bid->total = Input::post('total');
				$bid->type = $val->validated('type');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('bid', $bid, false);
		}

		$this->template->title = "Bids";
		$this->template->content = View::forge('bid/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('bid');

		if ($bid = Model_Bid::find($id))
		{
			$bid->delete();

			Session::set_flash('success', 'Deleted bid #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete bid #'.$id);
		}

		Response::redirect('bid');

	}

}
