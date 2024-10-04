<?php include 'header.php'?>
<?php include 'navbar.php'?>
<?php include 'core/Question.php'?>
	<?php 
		if(isset($_GET['q_id'])){
			$question  = new Question;
			$getQuestion = $question->getOneQuestion($_GET['q_id']);
			if(count($getQuestion) == 1){
				$getQuestion = $getQuestion[0];
			}else{
				echo "Something Wrong!!";
				exit();
			}
		}else{
			echo "Invalid Request!!";
			exit();
		}	
		?>
	<div class="container">
		<div class="row">
		   <div class="col-8 offset-2 mt-2 mb-2 card"> 
				<h5 class="mt-4 mb-0">Question Details</h5>
				<hr>
				<h3 class="text-secondary">Title: <?= $getQuestion['title'] ?></h3>
				<h5 class="text-info">Description: <?= $getQuestion['description'] ?></h5> 	
			</div>
		</div>
		<div class="row">
			<div class="col-8 offset-2 card">
				<h5 class="mt-3">Comment Section:</h5>

				<?php 

					$getAnswers = $question->getAnswers($getQuestion['id']);
					// echo "<pre>";
					// print_r($getAnswers);
					// echo "<pre>";
				?>
				
				<?php foreach ($getAnswers as $answer): ?>
				<div class="border border-primary p-2 mb-3" 
				<?php if($answer['correct'] == 'yes'): ?>
				style="background-color: lightgrey;"
				<?php endif ?>>
					<div><?= $answer['answer_text'] ?></div>
					<small>Answer By:<?= $answer['username']?> </small>
					<?php if($getQuestion['id'] == $_SESSION['user_id'] && $answer['correct'] == 'no'): ?>
					<a href="mark-answer.php?q-id=<?= $getQuestion['id'] ?>&ans_id=<?= $answer['id'] ?>" class="btn btn-sm btn-primary">Mark as Right Answer</a>
					<?php endif ?>
				</div>
				<hr>
			    <?php endforeach ?>
				<?php if(isset($_SESSION['username'])): ?>
				<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					    if (isset($_POST['answer_text'], $_SESSION['question_id'], $_SESSION['user_id'])) {
					        $answer_text = $_POST['answer_text'];
					        $question_id = $_POST['question_id'];
					        $user_id = $_POST['user_id'];

					        $question->makeAnswer($question_id, $user_id, $answer_text);
					    } else {
					        echo "Error: Missing required fields.";
					    }
					}	
				?>	
				<form class="form-group" action="" method="POST">
					<textarea id="textarea" class="form-control" name="answer_text"></textarea>
					<input type="submit" name="submit" value="Comment" class="btn btn-sm btn-success mt-3 mb-3">
				</form>	
			    <?php endif ?>
			</div>
		</div>
	</div>

<?php include 'footer.php'?>	
