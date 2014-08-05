<?php

class TeamModel
{
	//构造函数
	public function __construct($db) 
	{
		try {
			$this->db = $db;
		} catch (PDOException $e) {
			exit('Database connection could not be established.');
		}
	}

	//创建新队伍
	public function CreateTeam()
	{
		//获取输入，其中队长名由SESSION得到；同样使用strip_tags
		$team_name = strip_tags($_POST['team_name']);
		$team_slogan = strip_tags($_POST['team_slogan']);
		$team_captain = strip_tags($_SESSION['user_id']);
		//如果邀请加入的队员已经加入其他队伍，则失败；为了对用户更友好，写得稍微麻烦了一点
		if (isset($_POST['team_member1'])) {
			$team_member1 = strip_tags($_POST['team_member1']);
			$user_id = $team_member1;
			$query = $this->db->prepare("SELECT user_team FROM users WHERE user_id = :user_id");
			$query->execute(array(':user_id' = $user_id));
			$result = $query->fetch();

			if (isset($result->user_team)) {
				$_SESSION['invalid_member_name'] = $result->user_nickname;
				$_SESSION['feedback_negtive'][] = FEEDBACK_MEMBER_ALREADY_HAS_TEAM;
				return false;
			}
		} else {
			$team_member1 = '';
		}
		if (isset($_POST['team_member2'])) {
			$team_member2 = strip_tags($_POST['team_member2']);
			$user_id = $team_member1;
			$query = $this->db->prepare("SELECT user_team FROM users WHERE user_id = :user_id");
			$query->execute(array(':user_id' = $user_id));
			$result = $query->fetch();

			if (isset($result->user_team)) {
				$_SESSION['invalid_member_name'] = $result->user_nickname;
				$_SESSION['feedback_negtive'][] = FEEDBACK_MEMBER_ALREADY_HAS_TEAM;
				return false;
			}
		} else {
			$team_member2 = '';
		}
		//向数据库中插入新队伍数据
		$query = $this->db->prepare("INSERT INTO teams 
			(team_name, team_slogan, team_captain, team_member1, team_member2)
			VALUES (:team_name, :team_slogan, :team_captain, :team_member1, :team_member2)");
		$query->execute(array(:team_name = $team_name, 
			:team_slogan = $team_slogan,
			:team_captain = $team_captain,
			:team_member1 = $team_member1,
			:team_member2 =$team_member2));
		$count = $query->rowCount();
		if ($count != 1) {
			$_SESSION['feedback_negtive'][] = FEEDBACK_TEAM_CREATE_FAIED;
			return false;
		}
		$_SESSION['feedback_positive'][] = FEEDBACK_TEAM_CREATE_SUCCESSFULLY;
		return true;
	}
}
