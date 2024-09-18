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
                    $checkOneUser = $user->checkOneUser($_POST['username'],$_POST['password']);
                    
                    if(count($checkOneUser) == 1){
                        
                        $getUserId = $checkOneUser[0]['id'];
                        $getUsername = $checkOneUser[0]['username'];
                        if(!isset($_SESSION)) 
                        { 
                            session_start(); 
                        }   
                        $_SESSION['user_id'] = $getUserId;
                        $_SESSION['username'] = $getUsername; 
                        header("location:index.php");
                        echo "<p class='alert alert-success mt-2'>Logged In Successfully!!!</p>";
                        }
                        else{
                        header('location:login.php');
                        echo "<p class='alert alert-danger mt-2'>Credential Dose Not Match!!!</p>";
                    }  
                  }
            ?>
			 <form action="" method="POST">
			  <h3>Login Here</h3>
			  <div class="mb-3 mt-3">
			    <label for="exampleInputUsername1" class="form-label">Username</label>
			    <input type="text" name="username" class="form-control" id="exampleInputUsername1" required>
			  </div>	
			  <div class="mb-3">
			    <label for="exampleInputPassword1" class="form-label">Password</label>
			    <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
			  </div>
			  <button type="submit" name="submit" class="btn btn-primary">Login</button>
			  <span><a href="register.php">Register</a></span>
			</form>
		</div>
	</div>
</div>

<?php include 'footer.php'?>