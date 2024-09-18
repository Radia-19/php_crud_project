<?php include 'header.php'?>
<?php include 'navbar.php'?>
<?php include 'core/Question.php'?>

<main>
	<?php 
		$question  = new Question;
		$search = "";
		if(isset($_GET['query']))
		{
			$search = $_GET['query'];
		}
		$allQuestions = $question->getAllQuestions($search);

	?>
	<div class="container">
		<div class="row"> 
			<?php foreach($allQuestions as $question): ?>
			<div class="col-8 offset-2 mt-2 mb-2 card">
				<?php 
				    $link = "add-details.php?q_id=".$question['id'];
				?>
			  <h3 class="mt-3"><a href="<?= $link ?>" class="text-black text-decoration-none"><?= $question['title']?></a></h3>	
			  <small><a href="#" class="text-secondary text-decoration-none"> Created: <?= date('d M, Y',strtotime($question['created_at'])) ?>  || 
			  	  Question by: <?= $question['username'] ?></a></small>
			  <div class="col-12" style="text-align: right;">
			  	<?php if(isset($_SESSION['user_id']) && $question['user_id'] == $_SESSION['user_id']): ?>
			  	<a href="update-question.php?q_id=<?= $question['id'] ?>" class="text-success text-decoration-none">Edit</a>
			  	<a href="delete-question.php?q_id=<?= $question['id'] ?>" onclick="return confirm('Are you sure?')" class="text-danger text-decoration-none">Delete</a>
			  	<?php endif ?>
			  </div>	
			  
			</div>
		    <?php endforeach; ?>
			
		</div>
		
	</div>

</main>
<!--END Main-->

<?php include 'footer.php'?>


