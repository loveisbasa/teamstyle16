<?php
class ForumModel
{
	public function __construct($db) {
				try {
				$this->db = $db;
				}
			   	catch (PDOException $e) {
				exit('Database connection could not be established.');
				}
	}

	public function Showforums()		//取得分板块的名称
		{
				$sql="SELECT * from forums";
				$query=$this->db->prepare($sql);
				$query->execute();
				return $query->fetchAll();
		}

	public function Showthreads($forum_id)
		{
				if(isset($forum_id) and filter_var($forum_id,FILTER_VALIDATE_INT,array('min_range'=>1))){
					$sql="SELECT * FROM threads inner join users on threads.user_id=users.user_id WHERE forum_id={$forum_id} ORDER BY latest_reply DESC";
					$query=$this->db->prepare($sql);
					$query->execute();
					$sql="SELECT title,intro FROM forums WHERE forum_id={$forum_id}";
					$theme=$this->db->prepare($sql);
					$theme->execute();
					$result = $theme->fetch();
					if ($theme->rowCount()==1){
						$_SESSION['forum_theme'] = $result->title;
						$_SESSION['forum_intro'] = $result->intro;
						$_SESSION['forum_id'] = $forum_id;
					}
					$sql="SELECT subject,thread_id FROM threads ORDER BY reply_count DESC";
					$_SESSION['thread_hot_link'] = $this->db->prepare($sql);
					$_SESSION['thread_hot_link']->execute();
					$sql="SELECT subject,thread_id FROM threads ORDER BY establish_date DESC";
					$_SESSION['thread_link'] = $this->db->prepare($sql);
					$_SESSION['thread_link']->execute();
					$sql="SELECT forum_id,title FROM forums";
					$_SESSION['forum_link'] = $this->db->prepare($sql);
					$_SESSION['forum_link']->execute();
	  			    return $query->fetchAll();
				}
		}

	public function Showposts($thread_id)
	{
				if(isset($thread_id) and filter_var($thread_id,FILTER_VALIDATE_INT,array('min_range'=>1))){
					$sql="SELECT t.subject as subject,p.message as message,user_nickname,p.post_on AS posted
						FROM
						threads AS t LEFT JOIN posts AS p USING (thread_id) INNER JOIN users AS u on p.user_id=u.user_id
						WHERE t.thread_id={$thread_id} ORDER BY p.post_on ASC";
				$query=$this->db->prepare($sql);
				$query->execute();
				$sql="SELECT user_id,subject,content,reply_count,establish_date FROM threads WHERE thread_id={$thread_id}";
				$user = $this->db->prepare($sql);
				$user->execute();
				$result = $user->fetch();
				$_SESSION['writer_id'] = $result->user_id;
				$_SESSION['thread_subject'] = $result->subject;
				$_SESSION['thread_content'] = $result->content;
				$_SESSION['reply_count'] = $result->reply_count;
				$_SESSION['establish_date'] = $result->establish_date;
				$sql="SELECT * FROM users WHERE user_id={$_SESSION['writer_id']}";
				$writer = $this->db->prepare($sql);
				$writer->execute();
				$result = $writer->fetch();
				$_SESSION['writer_nickname'] = $result->user_nickname;
				$_SESSION['writer_email'] = $result->user_email;
				$sql="SELECT * FROM threads WHERE user_id={$_SESSION['writer_id']} ORDER BY reply_count DESC";
                $_SESSION['writer_link'] = $this->db->prepare($sql);
                $_SESSION['writer_link']->execute();
				return $query->fetchAll();
				}
	}
	
		public function ShowUSERposts($user_id)
	{
				if(isset($user_id) and filter_var($user_id,FILTER_VALIDATE_INT,array('min_range'=>1))){
					$sql="SELET t.subject as subject ,p.message as message ,user_nickname,p.post_on AS posted
						FROM
						threads AS t LEFT JOIN posts AS P USING (thread_id) INNER JOIN users AS u on p.user_id=u.user_id
						WHERE p.user_id={$user_id} ODERED BY p.post_on ASC";
					$query=$this->db->prepare($sql);
					$query->execute();
					return $query->fetchAll();
				}
	}
//管理员专用
		public function Create_forum(){
				if($_SESSION['user_type']='admin'){
					if (empty($_POST['forum_title'])) {
						$_SESSION["feedback_negative"][] =FEEDBACK_FORUMTITLE_EMPTY;
					}
					elseif(empty($_POST['forum_intro'])){
						$_SESSION["feedback_negative"][] =FEEDBACK_FORUMINTRO_FREE;			
					}
					else{
					$title=strip_tags($_POST['forum_title']);
					$intro=strip_tags($_POST['forum_intro']);				
					$d=date('Y-m-d H:i:s');
					$sql="INSERT into forums(title,intro,latest_reply,count_thread,count_post) 
						VALUES
						(:title,:intro,'{$d}',0,0)";
					echo $sql;
					$query=$this->db->prepare($sql);
					if($query->execute(array(':title'=>$title,':intro'=>$intro))) return 'true'; 
					else $_SESSION["feedback_negative"][]=FEEDBACK_FORUM_INSERT_ERROR;								
					}
				}
				else{
				$_SESSION["feedback_negative"][]= FEEDBACK_PERMISSION_DENIED;
				}
		}

		public function Create_thread($forum_id){
			echo $_POST['thread_subject'];
			if (empty($_POST['thread_subject'])) {
			$_SESSION["feedback_negative"][] =FEEDBACK_THREAD_SUBJECT_EMPTY;
			}
			elseif(empty($_SESSION['user_id']))
			 	$_SESSION['feedback_negative'][] =FEEDBACK_NO_LOGIN;
			else{
				$user_id=$_SESSION['user_id'];
				$subject=strip_tags($_POST['thread_subject']);
				$content=strip_tags($_POST['message']);	
				$d=date('Y-m-d H:i:s');			
				$sql="INSERT into threads (forum_id,user_id,subject,content,establish_date,latest_reply)
						VALUES
						({$forum_id},{$user_id},:subject,:content,'{$d}','{$d}')";
				$query=$this->db->prepare($sql);
				$query->execute(array(':subject'=>$subject,':content'=>$content));
				$sql="UPDATE forums SET count_thread=count_thread+1 where forum_id={$forum_id}";
				$query=$this->db->prepare($sql);
				if(!$query->execute())   $_SESSION["feedback_negative"][] =FEEDBACK_THREAD_INSESRT_ERROR;	
				else return 'true';
				}
		}			

		public function Create_Post($thread_id){
			if (empty($_POST['message'])) {
			$_SESSION["feedback_negative"][] =FEEDBACK_POST_MESSAGE_EMPTY;
			}
			elseif(empty($_SESSION['user_id'])) $_SESSION['feedback_negative'][] =FEEDBACK_NO_LOGIN;
			else{
				$user_id=$_SESSION['user_id'];
				$message=strip_tags($_POST['message']);
				$d=date('Y-m-d H:i:s');
				$sql="INSERT into posts (thread_id,user_id,message,post_on)
					VALUES
					({$thread_id},{$user_id},:message,'{$d}')";
				$query=$this->db->prepare($sql);
				$query->execute(array(':message'=>$message)); 
				$sql="SELECT forum_id FROM threads WHERE thread_id={$thread_id}";
				$query=$this->db->prepare($sql);
				if(!$query->execute())   $_SESSION["feedback_negative"][] =FEEDBACK_THREAD_INSESRT_ERROR;	
				$forum_id=$query->fetch()->forum_id;
				$sql="UPDATE forums SET count_post=count_post+1 where forum_id={$forum_id}";
				$query=$this->db->prepare($sql);$query->execute();
				$sql="UPDATE threads SET latest_reply='{$d}',reply_count=reply_count+1 where thread_id={$thread_id}";
				$query=$this->db->prepare($sql);
				if(!$query->execute())   $_SESSION["feedback_negative"][] =FEEDBACK_THREAD_INSESRT_ERROR;	
				else return 'true';
				}
		}		
	}
