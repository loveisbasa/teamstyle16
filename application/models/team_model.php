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

	public function IsUserInTeam($uid)
	{
		$query = $this->db->prepare("SELECT user_team FROM users WHERE user_id = :user_id");
		$query->execute(array(':user_id' => $uid));
		$result = $query->fetch();
		if ($result->user_team != NULL) {
			return 1;
		} else {
			return 0;
		}

	}

	//创建新队伍
	//当队伍名已存在，队员名不存在，队员已加入其他队伍返回false；成功insert新队伍信息返回true
	public function CreateTeam()
	{
		//前面这些if语句用来验证输入，只有完全符合要求才进入与数据库交互的模块
		if (empty($_POST['team_name'])) {
			$_SESSION["feedback_negative"][] = FEEDBACK_TEAMNAME_FIELD_EMPTY;
		} elseif (empty($_POST['team_password_new']) OR empty($_POST['team_password_repeat'])) {
			$_SESSION["feedback_negative"][] = FEEDBACK_PASSWORD_FIELD_EMPTY;
		} elseif ($_POST['team_password_new'] !== $_POST['team_password_repeat']) {
			$_SESSION["feedback_negative"][] = FEEDBACK_PASSWORD_REPEAT_WRONG;
		} elseif (strlen($_POST['team_password_new']) < 4) {
			$_SESSION["feedback_negative"][] = FEEDBACK_PASSWORD_TOO_SHORT;
		} elseif (strlen($_POST['team_name']) > 64 OR strlen($_POST['team_name']) < 2) {
			$_SESSION["feedback_negative"][] = FEEDBACK_USERNAME_TOO_SHORT_OR_TOO_LONG;
		} elseif ( !empty($_POST['team_name'])
			AND strlen($_POST['team_name']) <= 64
			AND strlen($_POST['team_name']) >= 2
			AND !empty($_POST['team_password_new'])
			AND !empty($_POST['team_password_repeat'])
			AND ($_POST['team_password_new'] === $_POST['team_password_repeat'])) {
			//获取输入，其中队长名由SESSION得到；同样使用strip_tags
			$team_name = strip_tags($_POST['team_name']);
			$team_slogan = strip_tags($_POST['team_slogan']);
			$team_captain = $_SESSION['user_id'];
			$hash_cost_factor = (defined('HASH_COST_FACTOR') ? HASH_COST_FACTOR : null);
			$team_password_hash = md5($_POST['team_password_new']);
			$team_full = 1;

			
			//队伍名已经存在
			$query = $this->db->prepare("SELECT team_id FROM teams WHERE team_name = :team_name");
			$query->execute(array(':team_name' => $team_name));
			$count = $query->rowCount();
			if ($count ==1) 
			{
				$_SESSION["feedback_negative"][] = FEEDBACK_TEAMNAME_ALREADY_TAKEN;
				return false;
			}

			//如果邀请加入的队员已经加入其他队伍或没有该队员，则失败
			//TODO:获取队员昵称的方式有待研究，暂定为文本输入；
			if ($_POST['team_member1'] != '') {
				$team_member1 = strip_tags($_POST['team_member1']);
				$user_nickname = $team_member1;
				//获取输入，其中队长名由SESSION得到；同样使用strip_tags
				$team_name = strip_tags($_POST['team_name']);
			
				$query = $this->db->prepare("SELECT user_team, user_id FROM users WHERE user_nickname = :user_nickname");
				$query->execute(array(':user_nickname' => $user_nickname));
				$count = $query->rowCount();
				if ($count != 1) {
					$_SESSION['feedback_negative'][] = FEEDBACK_INVALID_TEAM_MEMBER;
					return false;
				}
				$result = $query->fetch();
				if ($result->user_team != NULL) {
					//$_SESSION['invalid_member_name'] = $result->user_nickname;
					$_SESSION['feedback_negative'][] = FEEDBACK_MEMBER_ALREADY_HAS_TEAM;
					return false;
				}
				$team_member1 = $result->user_id;
			} else {
				$team_member1 = 0;
				$team_full = 0;//member1为空，队伍不满
			}

			if ($_POST['team_member2'] != '') {
				$team_member2 = strip_tags($_POST['team_member2']);
				$user_nickname = $team_member2;
				$query = $this->db->prepare("SELECT user_team, user_id FROM users WHERE user_nickname = :user_nickname");
				$query->execute(array(':user_nickname' => $user_nickname));
				$count = $query->rowCount();
				if ($count != 1) {
					$_SESSION['feedback_negative'][] = FEEDBACK_INVALID_TEAM_MEMBER;
					return false;
				}
				$result = $query->fetch();
				if ($result->user_team != NULL) {
					//$_SESSION['invalid_member_name'] = $result->user_nickname;
					$_SESSION['feedback_negative'][] = FEEDBACK_MEMBER_ALREADY_HAS_TEAM;
					return false;
				}
				$team_member2 = $result->user_id;
			} else {	
				$team_member2 = 0;
				$team_full = 0;//member2为空，队伍不满
			}	
			//更新team_full
			//if ($result->team_member1 != '' && $result->team_member2 != '')
			//	$team_full = 1;
			//向数据库中插入新队伍数据
			$query = $this->db->prepare("UPDATE users SET user_team = :user_team WHERE user_id = :user_id");
			$query->execute(array('user_team' => $team_name, ':user_id' => $team_captain));
			$query->execute(array('user_team' => $team_name, ':user_id' => $team_member1));
			$query->execute(array('user_team' => $team_name, ':user_id' => $team_member2));
			//$count = $query->rowCount();
			// if ($count != 1) {
			// 	$_SESSION['feedback_negative'][] = FEEDBACK_TEAM_CREATE_FAIED;
			// 	return false;
			// }
			//$query->execute(array(':user_id' => $team_member1));
			//$query->execute(array(':user_id' => $team_member2));
			
			$query = $this->db->prepare("INSERT INTO teams (team_name, team_password_hash, team_slogan, team_captain, team_member1, team_member2, team_full)
				VALUES (:team_name, :team_password_hash, :team_slogan, :team_captain, :team_member1, :team_member2, :team_full)");
			$query->execute(array(':team_name' => $team_name,
				':team_password_hash' => $team_password_hash, 
				':team_slogan' => $team_slogan,
				':team_captain' => $team_captain,
				':team_member1' => $team_member1,
				':team_member2' => $team_member2,
				':team_full' => $team_full));
			$SESSION['user_team']=$team_name;
			$count = $query->rowCount();
			if ($count != 1) {
				$_SESSION['feedback_negative'][] = FEEDBACK_TEAM_CREATE_FAIED;
				return false;
			}
			$_SESSION['feedback_positive'][] = FEEDBACK_TEAM_CREATE_SUCCESSFULLY;
			$_SESSION['in_team'] = 1;
			return true;
		}
	}

	//team_id通过参数来传递；
	//将操作用户的id作为team_member之一，更新数据库teams表
	//密码验证通过则返回true,否则返回false
	public function JoinTeam($team_id)
	{
		$user_id = $_SESSION['user_id'];
		echo $this->IsUserInTeam();
		//$team_id = $_POST['team_id'];
		if ($this->IsUserInTeam()) {
			$_SESSION['feedback_negative'][] = FEEDBACK_JOIN_FAILED;
			return false;
		}
		//从数据库中获取队伍数据
		$sql = "SELECT team_id, 
			team_name, 
			team_password_hash,  
			team_member1,
			team_member2,
			team_full
			FROM teams
		             WHERE (team_id = :team_id) ";
		$query = $this->db->prepare($sql);
		$query->execute(array(':team_id' => $team_id));
		$count = $query->rowCount();
		if ($count != 1) {
			$_SESSION['feedback_negative'][] = FEEDBACK_JOIN_FAILED;
			return false;
		}
		$result = $query->fetch();
		//验证队伍密码
		if (md5($_POST['team_password'])== $result->team_password_hash) {
			//由于队伍中可能存在队员，分情况更新数据
			if ($result->team_full == 1) {
				$_SESSION['feedback_negative'][] = FEEDBACK_TEAM_FULL;
				return false;
			}
						
			if ($result->team_member1 == 0) {
				$result->team_member1 = $user_id;
				$query = $this->db->prepare("UPDATE teams SET team_member1 = $user_id 
					WHERE team_id = :team_id");
				$query->execute(array(':team_id' => $result->team_id));
				$query = $this->db->prepare("UPDATE users SET user_team = :user_team WHERE user_id = :user_id");
				$query->execute(array('user_team' => $result->team_name, ':user_id' => $user_id));
			} else if ($result->team_member2 == 0) {
				$result->team_member2 = $user_id;
				$query = $this->db->prepare("UPDATE teams SET team_member2 = $user_id 
					WHERE team_id = :team_id");
				$query->execute(array(':team_id' => $result->team_id));
				$query = $this->db->prepare("UPDATE users SET user_team = :user_team WHERE user_id = :user_id");
				$query->execute(array('user_team' => $result->team_name, ':user_id' => $user_id));
			} else {
				$_SESSION['feedback_negative'][] = FEEDBACK_UNKONW_ERROR;
				return false;
			}
			//更新team_full
			if ($result->team_full == 0 && $result->team_member1 != 0 && $result->team_member2 != 0) {
				$result->team_full = 1;
				$query = $this->db->prepare("UPDATE teams SET team_full = $result->team_full
					WHERE team_id = :team_id");
				$query->execute(array(':team_id' => $result->team_id));
			}
			$SESSION['user_team']=team_name;
		} else {
			$_SESSION["feedback_negative"][] = FEEDBACK_PASSWORD_WRONG;
			return false;
		}
		$_SESSION['in_team'] = 1;
	}
	//返回一个array，TODO:分页显示
	public function GetAllTeams($page)
	{
		$query = $this->db->prepare("SELECT u1.user_nickname as team_captain,team_id, team_name, team_slogan, u2.user_nickname as team_member1, u3.user_nickname as team_member2,team_full
			FROM teams inner JOIN users as u1 on teams.team_captain=u1.user_id 
			left JOIN users as u2 on teams.team_member1=u2.user_id
		  left JOIN users as u3 on teams.team_member2=u3.user_id");
		$query->execute();
		$result = $query->fetchAll();
		return $result;
	}
	public function Invite_team($user_id){
		$result=$_SESSION['user_profile'];
		if (md5($_POST['team_password'])== $result->team_password_hash&&$result->team_full==0 ){
                  $sql = "INSERT into messages(message_from_id,message_to_id,message_title,message_content,message_send_date,message_is_read,message_type)
				VALUES
				(:message_from_id,:message_to_id,:message_title,:message_content,:message_send_date, 0 ,:message_type)";
										$d = date('Y-m-d H:i:s');
										$url=URL . "team/joinbyinvite/" . md5($_SESSION['user_profile']->team_password_hash) . "?team_id=" . $_SESSION['user_profile']->team_id ;
                    $query = $this->db->prepare($sql);
                    $query->execute(array(
                        ':message_from_id' => $_SESSION['user_profile']->user_id,
                        ':message_to_id' => $user_id,
                        ':message_title' => "邀请你的加入",
												':message_content' =>$_SESSION['user_profile']->team_name . "的队长" . $_SESSION['user_profile']->user_nickname . "邀请你加入,请点击<br /><a href='{$url}'>
												<button type='button' class='btn btn-default'>加入</button>
												</a> " ,
                        ':message_send_date' => $d ,
                        ':message_type' =>"sec" 
                    ));
				if($query) $_SESSION['feedback_positive'][]="邀请已发送，请耐心等候对方确认";
		}
	}
	public function Join_team_byinvite($team_id,$key)
	{
		$user_id = $_SESSION['user_id'];
		echo $this->IsUserInTeam();
		//$team_id = $_POST['team_id'];
		if ($this->IsUserInTeam()) {
			$_SESSION['feedback_negative'][] = FEEDBACK_JOIN_FAILED;
			return false;
		}
		//从数据库中获取队伍数据
		$sql = "SELECT team_id, 
			team_name, 
			team_password_hash,  
			team_member1,
			team_member2,
			team_full
			FROM teams
		             WHERE (team_id = :team_id) ";
		$query = $this->db->prepare($sql);
		$query->execute(array(':team_id' => $team_id));
		$count = $query->rowCount();
		if ($count != 1) {
			$_SESSION['feedback_negative'][] = FEEDBACK_JOIN_FAILED;
			return false;
		}
		$result = $query->fetch();
		//验证队伍密码
		if ($key == $result->team_password_hash) {
			//由于队伍中可能存在队员，分情况更新数据
			if ($result->team_full == 1) {
				$_SESSION['feedback_negative'][] = FEEDBACK_TEAM_FULL;
				return false;
			}
						
			if ($result->team_member1 == 0) {
				$result->team_member1 = $user_id;
				$query = $this->db->prepare("UPDATE teams SET team_member1 = $user_id 
					WHERE team_id = :team_id");
				$query->execute(array(':team_id' => $result->team_id));
				$query = $this->db->prepare("UPDATE users SET user_team = :user_team WHERE user_id = :user_id");
				$query->execute(array('user_team' => $result->team_name, ':user_id' => $user_id));
			} else if ($result->team_member2 == 0) {
				$result->team_member2 = $user_id;
				$query = $this->db->prepare("UPDATE teams SET team_member2 = $user_id 
					WHERE team_id = :team_id");
				$query->execute(array(':team_id' => $result->team_id));
				$query = $this->db->prepare("UPDATE users SET user_team = :user_team WHERE user_id = :user_id");
				$query->execute(array('user_team' => $result->team_name, ':user_id' => $user_id));
			} else {
				$_SESSION['feedback_negative'][] = FEEDBACK_UNKONW_ERROR;
				return false;
			}
			//更新team_full
			if ($result->team_full == 0 && $result->team_member1 != 0 && $result->team_member2 != 0) {
				$result->team_full = 1;
				$query = $this->db->prepare("UPDATE teams SET team_full = $result->team_full
					WHERE team_id = :team_id");
				$query->execute(array(':team_id' => $result->team_id));
			}
			$SESSION['user_team']=team_name;
		} else {
			$_SESSION["feedback_negative"][] = FEEDBACK_PASSWORD_WRONG;
			return false;
		}
		$_SESSION['in_team'] = 1;

	}
	//退出当前队伍
	public function QuitTeam()
	{
		$user_id = $_SESSION['user_id'];
		$team_name=$_SESSION['user_team'];
		$query = $this->db->prepare("SELECT team_id,team_captain, team_member1, team_member2, team_full
			FROM teams
			WHERE (team_name='{$team_name}')");
		$query->execute();
		$result = $query->fetch();
		if ($user_id == $result->team_member1) {
				$query = $this->db->prepare("UPDATE teams SET team_member1 = 0,team_full = 0 
					WHERE team_id = :team_id");
				$query->execute(array(':team_id' => $result->team_id));
				$query = $this->db->prepare("UPDATE users SET user_team =NULL WHERE user_id = :user_id");
				$query->execute(array(':user_id' => $user_id));
			$_SESSION['feedback_positive'][] = '成功退出，好聚好散';
			return true;
		} else if ($user_id == $result->team_member2) {
			$query = $this->db->prepare("UPDATE teams SET team_member2 = 0, team_full = 0
					WHERE team_id = :team_id");
			$query->execute(array(':team_id' => $result->team_id));
			
			$query = $this->db->prepare("UPDATE users SET user_team = NULL
			WHERE user_id = :user_id");
			$query->execute(array(':user_id' => $result->team_member2 ));
			$_SESSION['feedback_positive'][] = '成功退出，好聚好散';
			return true;
		} else {
			$query = $this->db->prepare("UPDATE users SET user_team = NULL WHERE user_id = :user_id");
			$query->execute(array( ':user_id' => $result->team_captain));
		
			$query = $this->db->prepare("UPDATE users SET user_team =NULL WHERE user_id = :user_id");
			$query->execute(array(':user_id' => $result->team_member1));

			$query = $this->db->prepare("UPDATE users SET user_team = NULL WHERE user_id = :user_id");
			$query->execute(array(':user_id' => $result->team_member2));

			$query = $this->db->prepare("DELETE FROM teams WHERE team_id = :team_id");
			$query->execute(array(':team_id' => $result->team_id));
			
			$_SESSION['in_team'] = 0;
			$_SESSION['feedback_positive'][] = '成功退出，好聚好散';
			return true;
		}

		$_SESSION['feedback_negative'][] = '出了些奇怪的问题……';
		return false;
	}

	public function Search($keyword)
	{
		if(!empty($keyword)){
			$sql="SELECT u1.user_nickname as team_captain,team_id, team_name, team_slogan, u2.user_nickname as team_member1, u3.user_nickname as team_member2,team_full
			FROM teams inner JOIN users as u1 on teams.team_captain=u1.user_id 
			left JOIN users as u2 on teams.team_member1=u2.user_id
			left JOIN users as u3 on teams.team_member2=u3.user_id
			where u1.user_nickname like '%{$keyword}%' or u2.user_nickname like '%{$keyword}%' or u3.user_nickname like '%{$keyword}%'  or  team_name like '%{$keyword}%' or team_slogan like '%{$keyword}%' or team_id='$keyword'";
			$query= $this->db->prepare($sql);
			$query->execute();
				
			return $query->fetchAll();
		}
		else 
		{
			$query = $this->db->prepare("SELECT u1.user_nickname as team_captain,team_id, team_name, team_slogan, u2.user_nickname as team_member1, u3.user_nickname as team_member2,team_full
			FROM teams inner JOIN users as u1 on teams.team_captain=u1.user_id 
			left JOIN users as u2 on teams.team_member1=u2.user_id
		  left JOIN users as u3 on teams.team_member2=u3.user_id");
		$query->execute();
		$result = $query->fetchAll();
		return $result;
		}
 	}
}
