<?php

class Controller_Emailtest extends Controller_Template
{

	public function action_index()
	{
		$data["subnav"] = array('index'=> 'active' );
		// Create an instance
$email = Email::forge();

// Set the from address
$email->from('alvintvafana@gmail.com', 'My Name');

// Set the to address
$email->to('ssithole@ttcs.co.zw', 'Johny Squid');

// Set a subject
$email->subject('This is the subject');

// Set multiple to addresses



// And set the body.
$email->body('This is my message');

try
{
    $email->send();
    Debug::dump($email);
}
catch(\EmailValidationFailedException $e)
{
    // The validation failed
    Debug::dump($e);
}
catch(\EmailSendingFailedException $e)
{
    // The driver could not send the email
    Debug::dump($e);
}		
		
		$this->template->title = 'Emailtest &raquo; Index';
		$this->template->content = View::forge('emailtest/index', $data);
	}

}
