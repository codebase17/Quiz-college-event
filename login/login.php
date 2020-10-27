<?php
  include '../header.php';
?>

<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a href="../index.php" class="navbar-brand">Quiz Application</a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav">
            <a href="../index.php" class="nav-item nav-link">Home</a>
            <a href="../pages/leaderboard.php" class="nav-item nav-link">Leaderboard</a>	
            <a href="../about.php" class="nav-item nav-link">About</a>
        </div>
        <div class="navbar-nav ml-auto">
            <?php if(isset($_SESSION['user_name'])) {
  
                }
                else{
                    echo '<a href="../register/register.php" class="nav-item nav-link">Register</a>
                            <a href="#" class="nav-item nav-link active">Login</a>';
                }
            ?>
      </div>
    </div>
</nav>
  


  
  <?php
  $wrongpassword=$_GET['wrongpassword'];
?>
  



<div class="jumbotron p-4">
     <div class="text-center">
        <p class="display-4">Login</p>       
     </div>
  </div>


<div class="container mt-2 mb-2">
       <div class="text-center">
           <?php
            if($wrongpassword)
                echo "<h5>You have entered wrong password</h5>";?>
        </div>
     </div>
    




<form class="jumbotron m-4" method="POST" action="login_details.php">
     <div class="form-group">
        <label for="inputEmail">Username</label>
        <input type="text" class="form-control" id="inputuser_name" placeholder="username" name="user_name" required>
    </div>
    <div class="form-group">
        <label for="inputPassword">Password</label>
        <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password" required>
    </div>
    <button type="submit" name="login_user" class="btn btn-dark">Sign in</button>
</form>

</body>
</html>
