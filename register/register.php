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
            <a href="../index.php" class="nav-item nav-link">Home</a>
            <a href="../about.php" class="nav-item nav-link">About</a>
        </div>
        <div class="navbar-nav ml-auto">
            <?php if(isset($_SESSION['user_name'])) {
  
                }
                else{
                    echo '<a href="#" class="nav-item nav-link active">Register</a>
                            <a href="../login/login.php" class="nav-item nav-link">Login</a>';
                }
            ?>
      </div>
    </div>
</nav>
  

<!--flag-->
  
  <?php
  include '../flag.php';
?>
  
  <!--flag end-->


 <?php
        $userexists=$_GET['userexists'];
        $emailexists=$_GET['emailexists'];
        $error=$_GET['error'];
   
  ?> 


<div class="jumbotron p-4">
     <div class="text-center">
        <p class="display-4">Register</p>       
     </div>
  </div>


<div class="container mt-2 mb-2">
       <div class="text-center">
           <?php
            if($userexists)
                echo "<h5>User already exists</h5>";
            else if($emailexists)
                echo "<h5>Email is already registered</h5>";
            else if($error)
                echo "<h5>Something happened. try again</h5>";
           ?>
        </div>
     </div>


<form class="jumbotron m-4" method="POST" action="register_details.php">
     <div class="form-group">
        <label for="inputusername">Username</label>
        <input type="text" class="form-control" id="inputuser_name" placeholder="username" name="user_name" required>
    </div>
    <div class="form-group">
        <label for="inputEmail">Email</label>
        <input type="email" class="form-control" id="inputemail" placeholder="email" name="email" required>
    </div>
    <div class="form-group">
        <label for="inputPassword">Password</label>
        <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password" required>
    </div>
    <button type="submit" name="register_user" class="btn btn-dark">Sign up</button>
</form>

</body>
</html>
