<?php

    session_start();
    include '../header.php';

?>

<body>
    
  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a href="../index.php" class="navbar-brand">Ka-nna-da</a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav">
            <a href="../index.php" class="nav-item nav-link">Home</a>
	          <a href="leaderboard.php" class="nav-item nav-link">Leaderboard</a>	
            <a href="../about.php" class="nav-item nav-link">About</a>
        </div>
        <div class="navbar-nav ml-auto">
            <!--<a href="register/register.php" class="nav-item nav-link">Register</a>
            <a href="login/login.php" class="nav-item nav-link">Login</a>&nbsp;&nbsp;-->
            <?php if(isset($_SESSION['user_name'])) {
                        echo '<a href="../profile.php" class="nav-item nav-link active"><i class="fa fa-user-o">  '.$_SESSION['user_name'].'</i></a>';
	 		echo '<a href="../login/logout.php" class="nav-item nav-link">Logout</a>';
                }
                else{
                    echo '<a href="../register/register.php" class="nav-item nav-link">Register</a>
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
	
	if(getUnsolved()==0)
	{
		getQuestion($user);	
	}
	else
	{
		getUnsolved($user);	
	}
	
	
?>
  
	<div class="text-center">
		<div class="container m-4">
			<img src="../assets/testimage.jpg" class="rounded mx-auto d-block" alt="image">
			<p class="m-4"><?=$question[0]?></p>
			<input class="form-control" type="text" placeholder="Enter your Answer">
			<button type="button" class="btn btn-primary m-4">SUBMIT</button>
		</div>
	</div>
  
  
  
  
  
  
</body>
</html>
