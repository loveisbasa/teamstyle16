<?php

class contact extends Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		require 'application/views/_templates/header.php';
		require 'application/views/contact/erroreport.php';
		require 'application/views/_templates/footer.php';
	}

	public function errorreporting()
	{
		$contact_model = $this->loadModel('Contact');
		$contact_success = $contact_model->sendemail();
		if ($contact_success == true) {
				header('location:' .URL. 'dashboard/index');
			} else {
				header('location:' .URL. 'login/index');
			}
	}
}