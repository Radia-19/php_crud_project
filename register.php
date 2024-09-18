<?php ob_start();?>
<?php include 'header.php'?>
<?php include 'navbar.php'?>
<?php include 'core/User.php'?>

<div class="container">
	<div class="row">
		<div class="col-6 offset-3 mt-5">
			<?php
			    if(isset($_POST['submit'])){
			            $user = new User;
			            $userCount = $user->checkPreviousUser($_POST['username'],$_POST['email']);      
			            if(count($userCount) > 0){
			            echo "<p class='alert alert-warning'>Username/Email Exits!!!</p>"; 
			            }else{
			            $user->register($_POST['username'],$_POST['email'],md5($_POST['password']));
			            echo "<p class='alert alert-success'>Register Sucessfully!</p>";
			            } 
			    } 
			?> 
			 <form action="" method="POST">
			  <h3>Register Here</h3>
			  <div class="mb-3 mt-3">
			    <label for="exampleInputUsername1" class="form-label">Username</label>
			    <input type="text" name="username" class="form-control" id="exampleInputUsername1" required>
			  </div>	
			  <div class="mb-3 mt-3">
			    <label for="exampleInputEmail1" class="form-label">Email</label>
			    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
			    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
			  </div>
			  <div class="mb-3">
			    <label for="exampleInputPassword1" class="form-label">Password</label>
			    <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
			  </div>
			  <!-- <div class="mb-3 form-check">
			    <input type="checkbox" class="form-check-input" id="exampleCheck1">
			    <label class="form-check-label" for="exampleCheck1">Check me out</label>
			  </div> -->
			  <button type="submit" name="submit" class="btn btn-primary">Register</button>
			  <span><a href="login.php">Login</a></span>
			</form>
		</div>
	</div>
</div>

<?php include 'footer.php'?>