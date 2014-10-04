<?php

class UsersModel extends avatarmodel
{
	public function __construct($db) 
	{
		try {
			$this->db = $db;
		} catch (PDOException $e) {
			exit('Database connection could not be established.');
		}
	}
	public function all_users()
	{
		$sql="select		user_nickname,user_id,user_has_avatar,user_email from users where user_type!='admin'";
		$query=$this->db->prepare($sql);
		$query->execute();
		$result=$query->fetchAll();
		foreach($result as $user){
		if (USE_GRAVATAR) {
				$user->user_avatar_link = $this->getGravatarLinkFromEmail($user->user_email);
			} else {
				$user->user_avatar_link = $this->getUserAvatarFilePath($user->user_has_avatar, $user->user_id);
			}
		}
		return $result;
	}
	public function one_users($user_id)
	{
			
	}
}
