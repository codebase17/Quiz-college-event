<?php
  include '../header.php';
?>

<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a href="../index.php" class="navbar-brand">Ka-nna-da</a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav">
            <a href="../index.php" class="nav-item nav-link active">Home</a>
            <a href="../about.php" class="nav-item nav-link">About</a>
        </div>
        <div class="navbar-nav ml-auto">
            <?php if(isset($_SESSION['user_name'])) {
  
                }
                else{
                    echo '<a href="../register/register.php" class="nav-item nav-link">Register</a>
                            <a href="#" class="nav-item nav-link">Login</a>';
                }
            ?>
      </div>
    </div>
</nav>
  

<!--flag-->
  
  <div class="card text-white bg-warning rounded-0" style="max-width: 100%;">
  <div class="card-body">
  </div>
</div>
  <div class="card text-white bg-danger rounded-0" style="max-width: 100%;">
  <div class="card-body">
  </div>
</div>
  
  <!--flag end-->


<div class="jumbotron">
     <div class="text-center">
        <p class="display-4">Login</p>       
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
