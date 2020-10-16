<?php

    include 'header.php';

?>

<body>
    
  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a href="#" class="navbar-brand">Ka-nna-da</a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav">
            <a href="#" class="nav-item nav-link active">Home</a>
            <a href="about.php" class="nav-item nav-link">About</a>
        </div>
        <div class="navbar-nav ml-auto">
            <!--<a href="register/register.php" class="nav-item nav-link">Register</a>
            <a href="login/login.php" class="nav-item nav-link">Login</a>&nbsp;&nbsp;-->
            <?php if(isset($_SESSION['user_name'])) {
  
                }
                else{
                    echo '<a href="register/register.php" class="nav-item nav-link">Register</a>
                            <a href="login/login.php" class="nav-item nav-link">Login</a>';
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
  
    
    <!--start-->
    <div class="m-5">
        <div class="text-center m-5">
            <button type="button" class="btn btn-dark">Start Quiz</button>
        </div>
    </div>
    <!--start end-->    
</body>
</html>
