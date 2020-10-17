<?php

    session_start();
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
  
    
    <!--timer-->
    
    <div class="timer text-center">
        <div style="background-color:black;color:white; height:4rem;">
            <p id="demo" class="p-3 m-5"></p>
        </div>
    </div>
    <!--timerend-->
    
    
    
    <!--start-->
    <div id="start" class="m-5">
        <div class="text-center m-5">
            <a href="pages/quiz.php"><button type="button" class="btn btn-dark">Start Quiz</button></a>
        </div>
    </div>
    <!--start end-->    
</body>


<style>
    /*Media Queries*/
	@media (min-width:320px)  { .timer{margin-left:2rem;margin-right:2rem;}/* smartphones, iPhone, portrait 480x320 phones */ }
	@media (min-width:481px)  { .timer{margin-left:2rem;margin-right:2rem;}/* portrait e-readers (Nook/Kindle), smaller tablets @ 600 or @ 640 wide. */ }
    	@media (min-width:641px)  { .timer{margin-left:2rem;margin-right:2rem;}/* portrait tablets, portrait iPad, landscape e-readers, landscape 800x480 or 854x480 phones */ }
	@media (min-width:961px)  { .timer{margin-left:38rem;margin-right:38rem;} /* tablet, landscape iPad, lo-res laptops ands desktops */ }
	@media (min-width:1025px) { .timer{margin-left:38rem;margin-right:38rem;} /* big landscape tablets, laptops, and desktops */ }
	@media (min-width:1281px) { .timer{margin-left:38rem;margin-right:38rem;} /* hi-res laptops and desktops */ }
	
</style>


<script>
// Set the date we're counting down to
var countDownDate = new Date("Nov 1, 2020 00:00:00").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = days + " D : " + hours + " H : "+ minutes + " M : " + seconds + " S";
    //document.getElementById("start").style.display="none";
        
  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("start").style.display="block";
  }
}, 1000);
</script>

</html>
