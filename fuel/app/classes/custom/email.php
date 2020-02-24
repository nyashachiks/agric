<?php
class Custom_Email
{
	
public function SendEmail($emailaddressesArray,$message,$subject)
	{
	\Package::load('email');
	// Create an instance
	$email = Email::forge();

		$email->subject('This is the subject');

	// Set multiple to addresses
	//Debug::dump($emailaddressesArray);die;
	$email->to($emailaddressesArray);

	// And set the body.
	$email->html_body(\View::forge('email/template', ['message'=>$message]));
	//$email->body($message);
	$email->from('innovation@ttcsglobal.com');
		try
		{
		   $email->send();
		    return TRUE;
		}
		catch(\EmailValidationFailedException $e)
		{
		    // The validation failed
		    throw $e;
		}
		catch(\EmailSendingFailedException $e)
		{
		    // The driver could not send the email;
		    throw $e;
		}
	}
}