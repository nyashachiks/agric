<?php
class Controller_Stoporder extends Controller_Template
{

	public function action_index()
	{
		$data['stoporders'] = Model_Stoporder::find_all();
		$this->template->title = "Stoporders";
		$this->template->content = View::forge('stoporder/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('stoporder');

		$data['stoporder'] = Model_Stoporder::find_by_pk($id);

		$this->template->title = "Stoporder";
		$this->template->content = View::forge('stoporder/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Stoporder::validate('create');
			$co_code=Input::post('company_code');
			//$stop_no=Input::post('stop_order_number');
			$code=  Input::post('code');
			$id_no= str_replace("-", "", Input::post('farmer_id'));
			$farmer_num=Input::post('farmer_number');
			$farmer_name=Input::post('farmer_name');
			$material_group= Input::post('material_number');
			$max_amount1= Input::post('max_amount');
			$effective_date1= Input::post('effective_date');
			$depot= Input::post('depot');
			$so_text= Input::post('so_text');
			$max_amount= floatval($max_amount1);
			$effective_date=date('Ymd',strtotime($effective_date1));
			//echo $effective_date; die;
			
			if ($val->run())
			{
				$stop_order_num=Custom_RFCUtility::create_stoporder($co_code, $id_no,$farmer_num,$code, $farmer_name, $material_group, $max_amount, $depot, $effective_date, $so_text );
				
				$stoporder = Model_Stoporder::forge(array(
					'company_code' => Input::post('company_code'),
					'stop_order_number' => $stop_order_num['SO_NUMBER'],
					'code' => Input::post('code'),
					'farmer_name' => Input::post('farmer_name'),
					'farmer_number' => Input::post('farmer_number'),
					'farmer_id' => Input::post('farmer_id'),
					'material_number' => Input::post('material_number'),
					'effective_date'=> date('Y-m-d',strtotime($effective_date1)),
					'depot'=> Input::post('depot'),
					'so_text'=> Input::post('so_text'),
					'max_amount' => Input::post('max_amount'),
					'created_at' => time(),
					'updated_at'=> 0 ,
				));

				if ($stoporder and $stoporder->save())
				{
					
					Session::set_flash('success', 'Added stoporder # '.$stoporder->stop_order_number.'.');
					Response::redirect('stoporder');
				}
				else
				{
					Session::set_flash('error', 'Could not save stoporder.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Stoporders";
		$this->template->content = View::forge('stoporder/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('stoporder');

		$stoporder = Model_Stoporder::find_one_by_id($id);

		if (Input::method() == 'POST')
		{
			$val = Model_Stoporder::validate('edit');

			$co_code=Input::post('company_code');
			$stop_no=Input::post('stop_order_number');
			$code=  Input::post('code');
			$id_no= str_replace("-", "", Input::post('farmer_id'));
			$farmer_num=Input::post('farmer_number');
			$farmer_name=Input::post('farmer_name');
			$material_group= Input::post('material_number');
			$max_amount1= Input::post('max_amount');
			$max_amount= floatval($max_amount1);
			$effective_date1= Input::post('effective_date');
			$depot= Input::post('depot');
			$so_text= Input::post('so_text');
			$effective_date=date('Ymd',strtotime($effective_date1));

			if ($val->run())
			{
				$stoporder->company_code = Input::post('company_code');
				$stoporder->stop_order_number = Input::post('stop_order_number');
				$stoporder->code = Input::post('code');
				$stoporder->farmer_name = Input::post('farmer_name');
				$stoporder->farmer_number = Input::post('farmer_number');
				$stoporder->farmer_id = Input::post('farmer_id');
				$stoporder->material_number = Input::post('material_number');
				$stoporder->max_amount = Input::post('max_amount');
				$stoporder->effective_date= date('Y-m-d',strtotime($effective_date1));
				$stoporder->depot= Input::post('depot');
				$stoporder->so_text= Input::post('so_text');
				$stop_order_num=Custom_RFCUtility::update_stoporder($id, $co_code, $stop_no, $id_no,$farmer_num,$code, $farmer_name, $material_group, $max_amount, $depot, $effective_date, $so_text );
				if ($stoporder->save())
				{
					
					Session::set_flash('success', 'Updated stoporder # '.$stoporder->stop_order_number.'.');
					Response::redirect('stoporder');
				}
				else
				{
					Session::set_flash('error', 'Nothing updated.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->set_global('stoporder', $stoporder, false);
		$this->template->title = "Stoporders";
		$this->template->content = View::forge('stoporder/edit');

	}

	public function action_delete($id = null)
	{
		if ($stoporder = Model_Stoporder::find_one_by_id($id))
		{
			
			Custom_RFCUtility::delete_stoporder($stoporder->stop_order_number );
			$stoporder->delete();

			Session::set_flash('success', 'Deleted stoporder #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete stoporder #'.$id);
		}

		Response::redirect('stoporder');

	}

}

