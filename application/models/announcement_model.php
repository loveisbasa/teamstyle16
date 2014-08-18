<?php

class AnnouncementModel()
{
	public function __construct($db) 
	{
		try {
			$this->db = $db;
		} catch (PDOException $e) {
			exit('Database connection could not be established.');
		}
	}
	//管理员通过窗口输入系统消息题目和正文
	public function write()
	{
		$ann_title = strip_tags($_POST['ann_title']);
		$ann_content = strip_tags($_POST['ann_content']);

		$query = $this->db->prepare("INSERT INTO announcements(ann_title, ann_content, ann_send_date)
			VALUES(:ann_title, :ann_content, :ann_send_date)");
		$query->execute(array(':ann_title' => $ann_title, ':ann_content' => $ann_content, 'ann_send_date' => date()));
		$_SESSION['feedback_positive'][] = FEEDBACK_ANN_SUCCESSFULLY;
		return true;
	}
	//获取所有的系统消息，返回一个数组
	//TODO:pages
	public function GetAll()
	{
		$query = $this->db->prepare("SELECT ann_title, ann_content, ann_send_date FROM announcements");
		$query->execute();

		return $query->fetchAll();
	}
}
