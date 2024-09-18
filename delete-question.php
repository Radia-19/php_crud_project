<?php include 'loginCheck.php'?>
<?php include 'core/Question.php'?>
<?php 
		if(isset($_GET['q_id'])){

			$question  = new Question;
			$getQuestion = $question->getOneQuestion($_GET['q_id']);

			if(count($getQuestion) == 1){

				$getQuestion = $getQuestion[0];

				if($getQuestion['user_id'] != $_SESSION['user_id'])
				{
					 echo "You are not aurthorized!!";
					 exit();
			}else{
				$question->deleteQuestion($getQuestion['id']);
				header("location:index.php");
				}
			}else{
				echo "Invalid Request!!";
				exit();
			}
		}		
	?>