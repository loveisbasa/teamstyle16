<?php

class Team extends Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	//public function index() {}

	public function join_team($team_id)
	{
		//echo "join";
		if (isset($team_id)) {
			$team_model = $this->loadModel('Team');
			$team_model->JoinTeam($team_id);
		}
		header('location:' .URL. 'team/team_display');
		
	}
	
	public function create_team()
	{
		$team_model = $this->loadModel('Team');
		if (!$team_model->IsUserInTeam($_SESSION['user_id'])) {
			require 'application/views/_templates/header.php';
			require 'application/views/team/createam.php';
			require 'application/views/_templates/footer.php';
		} else {
			$_SESSION["feedback_negative"][] = FEEDBACK_MEMBER_ALREADY_HAS_TEAM;
			header('location:' .URL. 'dashboard');
		}
	}

	public function team_display($page)
	{
		$team_model = $this->loadModel('Team');
		$all_team = $team_model->GetAllTeams($page);

		require 'application/views/_templates/header.php';
		require 'application/views/team/index.php';
		require 'application/views/_templates/footer.php';
		// while ($row = mysql_fetch_array($all_team)) 
		// {
		// 	echo $row['team_name']." ".$row['team_slogan']." ".$row['team_member1']." ".$row['team_member2'];
		// }

	}

	public function team_search()
	{
		$keyword=$_POST['keyword'];
		$team_model = $this->loadModel('Team');
		$all_team = $team_model->Search($keyword);

		require 'application/views/_templates/header.php';
		require 'application/views/team/index.php';
		require 'application/views/_templates/footer.php';
		// while ($row = mysql_fetch_array($all_team)) 
		// {
		// 	echo $row['team_name']." ".$row['team_slogan']." ".$row['team_member1']." ".$row['team_member2'];
		// }

	}

	public function create_action()
	{
		//echo "create";
		$team_model = $this->loadModel('Team');
		$create_team_success = $team_model->CreateTeam();
		if ($create_team_success == true) {
			//echo "successful";
			header('location:' .URL. 'dashboard');
		} else {
			//echo "failed";
			header('location:' .URL. 'team/create_team');
		}
	}
}
