<?php

class UsersModel 
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
		$sql="select	* from users where user_type!='admin'";
		$query=$this->db->prepare($sql);
		$query->execute();
		$result=$query->fetchAll();
		foreach($result as $user){
		if ($user->user_has_avatar) {
				$user->user_avatar_link =URL . AVATAR_PATH . $user->user_id . '.jpg' ;
			} else {
				$user->user_avatar_link = URL . AVATAR_PATH . AVATAR_DEFAULT_IMAGE;
			}
		}
		return $result;
	}
	public function one_users($user_id)
	{
			
	}
}
