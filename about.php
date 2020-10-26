<?php

    session_start();
    include 'header.php';

?>

<body>
    
  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a href="index.php" class="navbar-brand">Ka-nna-da</a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav">
            <a href="index.php" class="nav-item nav-link">Home</a>
	          <a href="pages/leaderboard.php" class="nav-item nav-link">Leaderboard</a>	
            <a href="#" class="nav-item nav-link active">About</a>
        </div>
        <div class="navbar-nav ml-auto">
            <!--<a href="register/register.php" class="nav-item nav-link">Register</a>
            <a href="login/login.php" class="nav-item nav-link">Login</a>&nbsp;&nbsp;-->
            <?php if(isset($_SESSION['user_name'])) {
                        echo '<a href="profile.php" class="nav-item nav-link active"><i class="fa fa-user-o">  '.$_SESSION['user_name'].'</i></a>';
	 		                  echo '<a href="login/logout.php" class="nav-item nav-link">Logout</a>';
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
 
  <?php
    
    include 'flag.php';
    
   ?>
  
  <!--flag end-->
  
  <div class="jumbotron text-center" >
	  <p class="display-4 mb-2">ಅಲೆಮಾರಿ</p>
	<p>ಯುವಿಸಿಇ ವೈಭವ ಪ್ರಯುಕ್ತ, IEEE UVCE ಕಡೆಯಿಂದ ನಿಧಿ ಶೋಧನೆ! ಕರುನಾಡ ಉದ್ದಗಲ ಪಯಣಿಸಿ, ಪ್ರಶ್ನೆಗಳಿಗೆ ಉತ್ತರಿಸಿ, ಮುಂದಿನ ನಿಲ್ದಾಣ ತಲುಪಿ!</p>
	  
	  <p class="display-4 mb-2 mt-4">Alemaari </p>
	<p>The treasure hunt of UVCE vaibhava presented to you by IEEE UVCE and Chetana. 
	Answer the questions related to our state and find your way to top of the leaderboard.</p>
  </div>
  
</body>
</html>
