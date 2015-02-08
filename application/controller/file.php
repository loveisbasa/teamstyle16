<?php
class File extends Controller
{
	public function __constrct()
	{
		parent::__constrct();
		//HandleLoggedIn();
	}
	public function index()
	{
		$file_model = $this->loadModel('File');
		$all_file = $file_model->GetAllFiles();
		require 'application/views/_templates/header.php';
		require 'application/views/file/index.php';
		require 'application/views/_templates/footer.php';
	}
	public function upload()
	{
		$file_model = $this->loadModel('File');
		$success = $file_model->MoveFile();
		if ($success)
			header('location:' .URL. 'file');
		else
			echo "error";
	}
	public function download($file_id)
	{
		$file_model = $this->loadModel('File');
		$file_success = $file_model->Download($file_id);

		require 'application/views/_templates/header.php';
		require 'application/views/file/index.php';
		require 'application/views/_templates/footer.php';
	}
}