<?php 
include 'Database.php';

class Question extends Database
{
    public function addQuestion($title,$description,$user_id)
    {
		$created_at = date('Y-m-d H:i:s');
		$sql = "INSERT INTO questions (title,description,user_id,created_at) VALUES ('$title','$description','$user_id','$created_at')";//query
		$this->exec($sql);
		return true;
	}
	public function getAllQuestions($search = "")
	{
		if($search == "")
		{
			$sql = "SELECT questions.id,questions.title,questions.description,questions.user_id,questions.created_at, users.username FROM questions join users on users.id=questions.user_id";
		}else{
			$sql = "SELECT questions.id,questions.title,questions.description,questions.user_id,questions.created_at, users.username FROM questions join users on users.id=questions.user_id WHERE questions.title LIKE '%$search%'";
		}
		
		return $this->fetch($sql);
	}
	public function getOneQuestion($q_id)
	{
		$sql = "SELECT * FROM questions WHERE id='$q_id'";
		return $this->fetch($sql);
	}
	public function makeAnswer($q_id,$user_id,$answer)
	{
		$sql = "INSERT INTO answers (`id`, `question_id`, `user_id`, `details`, `correct`) VALUES ('$q_id','$user_id,'$answer')";
		$this->exec($sql);		
	}
	public function getAnswers($q_id)
	{
		$sql = "SELECT answers.*,users.username FROM answers join users on users.id=answers.user_id WHERE question_id='$q_id'";
		return $this->fetch($sql);
	}
	public function updateQuestion($q_id,$title,$description)
	{
		$sql = "UPDATE questions SET title='$title',description='$description' WHERE id='$q_id'";
		$this->exec($sql);
	}
	public function deleteQuestion($q_id)
	{
		$sql = "DELETE FROM questions WHERE id='$q_id'";
		$this->exec($sql);
	}
	public function markAnswersRight($q_id,$ans_id)
	{
		$sql1 = "UPDATE answers SET correct='no' WHERE question_id='$q_id'";
		$this->exec($sql1);

		$sql2 = "UPDATE answers SET correct='yes' WHERE question_id='$q_id' AND id='$ans_id'";
		$this->exec($sql2);
	}	
}

?>