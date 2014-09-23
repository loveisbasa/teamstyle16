<?php
class File extends Controller
{
	public function __constrct()
	{
		parent::__constrct();
		//HandleLoggedIn();
	}
	public function upload()
	{
		$file_model = $this->loadModel('File');
		$success = $file_model->MoveFile();
		if ($success)
			header('location:' .URL. 'dashboard');
		else
			echo "error";
	}
}