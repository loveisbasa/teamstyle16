<?php
/**
*  
*/
class team extends Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{

	}

	public function join_team()
	{


	}

	public function create_team()
	{
		require 'application/views/_templates/header.php';
		require 'application/views/team/createam.php';
		require 'application/views/_templates/footer.php';
	}

	public function team_display()
	{
		echo "display";
		$team_model = $this->loadModel('Team');
		$display_team_model = $team_model->GetAllTeams();
	}

	public function create_action()
	{
		echo "create";
		$team_model = $this->loadModel('Team');
		$create_team_success = $team_model->CreateTeam();
		if ($create_team_success==true)
			{echo "successful";}
		else 
			{echo "failed";}
	}
}
?>