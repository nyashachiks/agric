<?php
class Controller_Document extends Controller_Template
{

	public function before()
	{
		parent::before();
		View::set_global('view_legend','Documents');
	}
	
	public function action_index()
	{
		$user_identity=Auth::get_user_id()[1];
		$data['documents'] = Model_Document::find_by('user_id',$user_identity);
		$this->template->title = "Documents";
		$this->template->content = View::forge('document/index', $data);

	}
	public function action_document()
	{
		 
		 $data['documents'] = Model_Document::find_by('user_id','9');
		//Session::set('docs',$docs);
		$this->template->title = "Documents";
		$this->template->content = View::forge('document/indexdoc', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('document');

		if ( ! $data['document'] = Model_Document::find($id))
		{
			Session::set_flash('error', 'Could not find document #'.$id);
			Response::redirect('document');
		}

		$this->template->title = "Document";
		$this->template->content = View::forge('document/view', $data);

	}
	
	public function action_download($id=null)
	{
		$document = Model_Document::find($id);
		//var_dump($document->saved_as);die;
		Custom_Filehandler::filedownload($document->saved_as, $document->actual_name);
	}
	public function action_downloaddoc($name)
	{
		//$namen='';
		//$namen=$name.'.pdf';
		//var_dump($namen);die;
		//$document = Model_Document::find($id);
		Custom_Filehandler::filedownload($name,$name);
	}
	
	public function action_create()
	{
		try{
		if (Input::method() == 'POST')
		{
			$val = Model_Document::validate('create');

			if ($val->run())
			{
				$file=Custom_Filehandler::upload(); //calling file upload function
				
				//var_dump($file);die;		
				
				$document = Model_Document::forge(array(
					'user_id' => Input::post('user_id'),
					'description' => Input::post('description'),
					'saved_as' => $file[0]['saved_as'],
					'actual_name' => $file[0]['name'],
				));

				if ($document and $document->save())
				{
					Session::set_flash('success', 'Document added successfully');

					Response::redirect('document');
				}

				else
				{
					Session::set_flash('error', 'Could not save document.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}
		}
		catch(Exception $e)
		{
			Session::set_flash('error',$e->getMessage());
		}
		$this->template->title = "Documents";
		$this->template->content = View::forge('document/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('document');

		if ( ! $document = Model_Document::find($id))
		{
			Session::set_flash('error', 'We could not find  that document. Please try again.');
			Response::redirect('document');
		}

		$val = Model_Document::validate('edit');

		if ($val->run())
		{
			
		
		
			$file=Custom_Filehandler::upload(); //calling file upload function
		
			$document->user_id = Input::post('user_id');
			$document->description = Input::post('description');
			$document->saved_as = $file[0]['saved_as'];
			$document->actual_name = $file[0]['name'];

			if ($document->save())
			{
				Session::set_flash('success', 'Updated document #' . $id);

				Response::redirect('document');
			}

			else
			{
				Session::set_flash('error', 'Could not update document #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$document->user_id = $val->validated('user_id');
				$document->description = $val->validated('description');
				$document->saved_as = $val->validated('saved_as');
				$document->actual_name = $val->validated('actual_name');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('document', $document, false);
		}

		$this->template->title = "Documents";
		$this->template->content = View::forge('document/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('document');

		if ($document = Model_Document::find($id))
		{
			$document->delete();

			Session::set_flash('success', 'Deleted document #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete document #'.$id);
		}

		Response::redirect('document');

	}

}
