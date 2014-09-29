<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Home extends Controller
{
	/**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
	public function index($user_nickname )
	{
		if ($user_nickname == '') {
			if (isset($_SESSION['user_logged_in'])) {
				header('location:' .URL. 'dashboard');
			} else {
				require 'application/views/_templates/header.php';
				require 'application/views/home/index.php';
				require 'application/views/_templates/footer.php';
			}
		} else {
			$user_model = $this->loadModel('Login');
			$user_profile = $user_model->getUserProfile($user_nickname);
			if ($user_profile->user_team!=null)
			{
				$team_captain = $user_model->getUserProfile($user_profile->team_captain);
				if ($user_profile->team_member1!=0) $team_member1 = $user_model->getUserProfile($user_profile->team_member1);
				if ($user_profile->team_member2!=0) $team_member2 = $user_model->getUserProfile($user_profile->team_member2);
			}
			require 'application/views/_templates/header.php';
			require 'application/views/home/profile.php';
			require 'application/views/_templates/footer.php';
		}
	}
}
