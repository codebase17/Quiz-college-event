<?php

    session_start();
    include 'header.php';

?>

<body>
    
  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a href="#" class="navbar-brand">ಅಲೆಮಾರಿ</a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav">
            <a href="#" class="nav-item nav-link active">Home</a>
	    <a href="pages/leaderboard.php" class="nav-item nav-link">Leaderboard</a>	
            <a href="about.php" class="nav-item nav-link">About</a>
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
  
    
  
    
    <!--start-->
    <div id="start" class="m-5">
        <div class="text-center m-5">
            <a href="pages/quiz.php"><button type="button" class="btn btn-dark">Enter Contest</button></a>
        </div>
    </div>
    <!--start end-->    
</body>


<style>
    /*Media Queries*/
	@media (min-width:320px)  { .timer{margin-left:1rem;margin-right:1rem;}/* smartphones, iPhone, portrait 480x320 phones */ }
	@media (min-width:481px)  { .timer{margin-left:1rem;margin-right:1rem;}/* portrait e-readers (Nook/Kindle), smaller tablets @ 600 or @ 640 wide. */ }
    	@media (min-width:641px)  { .timer{margin-left:1rem;margin-right:1rem;}/* portrait tablets, portrait iPad, landscape e-readers, landscape 800x480 or 854x480 phones */ }
	@media (min-width:961px)  { .timer{margin-left:38rem;margin-right:38rem;} /* tablet, landscape iPad, lo-res laptops ands desktops */ }
	@media (min-width:1025px) { .timer{margin-left:38rem;margin-right:38rem;} /* big landscape tablets, laptops, and desktops */ }
	@media (min-width:1281px) { .timer{margin-left:30rem;margin-right:30rem;} /* hi-res laptops and desktops */ }
	
</style>



</html>
