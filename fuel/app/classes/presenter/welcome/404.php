<?php

/**
 * The welcome 404 presenter.
 *
 * @package  app
 * @extends  Presenter
 */
class Presenter_Welcome_404 extends Presenter
{
	/**
	 * Prepare the view data, keeping this in here helps clean up
	 * the controller.
	 *
	 * @return void
	 */
	public function view()
	{
		$messages = array('Sorry the page you are looking for, cannot be found!',  'Page cannot be found here.');
		$this->title = $messages[array_rand($messages)];
	}
}
