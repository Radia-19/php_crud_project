<?php include 'header.php'?>
<?php include 'loginCheck.php'?>
<?php include 'navbar.php'?>
<?php include 'core/Question.php'?>
<?php 
		if(isset($_GET['q_id'])){
			$question  = new Question;
			$getQuestion = $question->getOneQuestion($_GET['q_id']);
			if(count($getQuestion) == 1){
				$getQuestion = $getQuestion[0];
				if($getQuestion['user_id'] != $_SESSION['user_id']){
					 echo "You are not aurthorized!!";
					 exit();
				}
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
		<h3 class="text-center mt-3">Update Question Here</h3>
		<div class="col-8 offset-2 card">
			<?php 
                if(isset($_POST['submit'])){
                   $question = new Question;
                   $question->updateQuestion($getQuestion['id'],$_POST['title'],$_POST['description']); 
                   header("location:index.php");
                }
            ?>
			<form class="" action="" method="POST">
				<div class="form-group mt-4 ">
					<label>Question Title</label>
					<input class="form-control mt-2" type="text" name="title" value="<?= $getQuestion['title'] ?>" placeholder="Question Name">
				</div>
				<div class="form-group mt-4 ">
					<label >Question Description</label>
					<textarea class="form-control mt-2" name="description" id="textarea"><?= $getQuestion['description'] ?></textarea>
				</div>
				<input type="submit" name="submit" value="Update Question" class="btn btn-success btn-block mt-4 mb-4" style="width:100%;">
			</form>
			
		</div>
	</div>
</div>

<!-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
<script type="text/javascript">
	tinymce.init({
	  selector: 'textarea'
	});
</script> -->

<?php include 'footer.php'?>
