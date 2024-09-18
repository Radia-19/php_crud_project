<?php 

if(!isset($_SESSION['username'])){
  session_start();
}

?> 

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="index.php">Mini StackOverflow</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <form class="form-inline d-flex" action="" method="GET">
        <input class="form-control me-2" type="text" name="query" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      <div class="form-inline navbar-nav ms-auto justify-content-end">
        <?php if(isset($_SESSION['username'])): ?>  
          <a class="nav-link" href="add-question.php">Add Question</a>
          <a class="nav-link" href="logout.php">Logout (<?= $_SESSION['username'] ?>)</a>
        <?php else: ?> 
          <a class="nav-link" href="login.php">Login</a>
          <a class="nav-link" href="register.php">Register</a>
        <?php endif; ?>
        
      </div>
    </div>
  </div>
</nav>
<!-- End Navbar -->