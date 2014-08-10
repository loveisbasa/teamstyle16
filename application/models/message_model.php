<?php

class MessageModel()
{
	public function __construct($db) 
	{
		try {
			$this->db = $db;
		} catch (PDOException $e) {
			exit('Database connection could not be established.');
		}
	}

	public function SendMessage()
	{

	}
	public function ReadMessage()
	{
		
	}
} 