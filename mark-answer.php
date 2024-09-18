<?php include 'core/Question.php'?>
<?php
	if(isset($_GET['q_id']) && isset($_GET['ans_id'])){
		$q_id = $_GET['q_id'];
		$ans_id = $_GET['ans_id'];

		$question = new Question;
		$question->markAnswersRight($q_id,$ans_id);
		header("location:add-details.php?q_id=".$q_id);
	} 
?>