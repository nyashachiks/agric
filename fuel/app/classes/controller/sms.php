<?php
class Controller_Sms extends Controller_Template
{

	public function action_index()
	{
		$data['sms'] = Model_Sm::find('all');
		$this->template->title = "Sms";
		$this->template->content = View::forge('sms/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('sms');

		if ( ! $data['sm'] = Model_Sm::find($id))
		{
			Session::set_flash('error', 'Could not find sm #'.$id);
			Response::redirect('sms');
		}

		$this->template->title = "Sm";
		$this->template->content = View::forge('sms/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Sm::validate('create');

			if ($val->run())
			{
				$sm = Model_Sm::forge(array(
					'username' => Input::post('username'),
					'sender_id' => Input::post('sender_id'),
					'recipients' => Input::post('recipients'),
					'body' => Input::post('body'),
					'sending_number' => Input::post('sending_number'),
					'message_id' => Input::post('message_id'),
				));
				
			
				if ($sm and $sm->save())
				{
					
					// Create map with request parameters
					$url="https://www.txt.co.zw/Remote/SendMessage";
					$fields = array (
					
					'Username' => ($sm->username),
					'Recipients' => ($sm->recipients),
					'Body' => ($sm->body), 
					'sending_number' => ($sm->sending_number)
					);
					
					// Build Http query using params
					$fields_string="";                                                               
	 				// converting the array into post data including the hashing         
					foreach($fields as $key=>$value) 
					{ 
					                $fields_string .= $key.'='.$value.'&';
					}

					rtrim($fields_string,'&');
					
					$opts = array('http' =>
					    array(
					        'method'  => 'POST',
					        'header'  => 'Content-type: application/x-www-form-urlencoded',
					        'content' => $fields_string
					    )
					);
					
					$context  = stream_context_create($opts);

					$result = file_get_contents($url, false, $context);
					
					$result1= substr($result, 0, 7);
		
					if($result1== "SUCCESS")
					{
						$result2= ltrim($result, 'SUCCESS:');
					
					}
					else
					{
						$result2= ltrim($result, 'ERROR:');
					}
					
					
					$sm->message_id=$result2;
					$sm->save();
					Session::set_flash('success', 'Added sm #'.$sm->id.'.');

					Response::redirect('sms');
				}

				else
				{
					Session::set_flash('error', 'Could not save sm.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Sms";
		$this->template->content = View::forge('sms/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('sms');

		if ( ! $sm = Model_Sm::find($id))
		{
			Session::set_flash('error', 'Could not find sm #'.$id);
			Response::redirect('sms');
		}

		$val = Model_Sm::validate('edit');

		if ($val->run())
		{
			
			$sm->username = Input::post('username');
			$sm->sender_id = Input::post('sender_id');
			$sm->recipients = Input::post('recipients');
			$sm->body = Input::post('body');
			$sm->sending_number = Input::post('sending_number');
			$sm->message_id = Input::post('message_id');

			if ($sm->save())
			{
				Session::set_flash('success', 'Updated sm #' . $id);

				Response::redirect('sms');
			}

			else
			{
				Session::set_flash('error', 'Could not update sm #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$sm->username = $val->validated('username');
				$sm->sender_id = $val->validated('sender_id');
				$sm->recipients = $val->validated('recipients');
				$sm->body = $val->validated('body');
				$sm->sending_number = $val->validated('sending_number');
				$sm->message_id = $val->validated('message_id');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('sm', $sm, false);
		}

		$this->template->title = "Sms";
		$this->template->content = View::forge('sms/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('sms');

		if ($sm = Model_Sm::find($id))
		{
			$sm->delete();

			Session::set_flash('success', 'Deleted sm #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete sm #'.$id);
		}

		Response::redirect('sms');

	}

}
