<?php include 'header.php'?>
<?php include 'loginCheck.php'?>
<?php include 'navbar.php'?>
<?php include 'core/Question.php'?>

<div class="container">
	<div class="row">
		<div class="col-8 offset-2 card">
			<?php 
                if(isset($_POST['submit'])){
                   $question = new Question;
                   $question->addQuestion($_POST['title'],$_POST['description'],$_SESSION['user_id']); 
                   echo "<p class='alert alert-success'>Added Your Question!!</p>";
                }
            ?>
			<form class="" action="" method="POST">
				<div class="form-group mt-4 ">
					<label>Question Title</label>
					<input class="form-control mt-2" type="text" name="title"  placeholder="Question Name">
				</div>
				<div class="form-group mt-4 ">
					<label >Question Description</label>
					<textarea class="form-control mt-2" name="description" id="textarea"></textarea>
				</div>
				<input type="submit" name="submit" value="Add Question" class="btn btn-success btn-block mt-4 mb-4" style="width:100%;">
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
