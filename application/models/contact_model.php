<?php

class ContactModel()
{
	public function __construct()
	{
		parent::__construct();
	}

	public function sendemail()
	{
		$to = "tanghaoyue13@mails.tsinghua.edu.cn";
		$subject = $_POST['error_theme'];
		$message = $_POST['error_text'];
		$from = "haoyuetang@126.com";
		mail("tanghaoyue13@mails.tsinghua.edu.cn","Subject: $subject",$message,"From: $from");
		return true;
	}
}