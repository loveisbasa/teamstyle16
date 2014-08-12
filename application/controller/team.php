<?php

class Team extends Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	//public function index() {}

	public function join_team()
	{
		echo "join";
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
		$all_team = $team_model->GetAllTeams();
		while ($row = mysql_fetch_array($all_team)) 
		{
			echo $row['team_name']." ".$row['team_slogan']." ".$row['team_member1']." ".$row['team_member2'];
		}

	}

	public function create_action()
	{
		echo "create";
		$team_model = $this->loadModel('Team');
		$create_team_success = $team_model->CreateTeam();
		if ($create_team_success == true) {
			echo "successful";
			header('location:' .URL. 'dashboard');
		} else {
			echo "failed";
			header('location:' .URL. 'team/create_team');
		}
	}
}