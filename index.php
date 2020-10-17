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
            <a href="about.php" class="nav-item nav-link">About</a>
        </div>
        <div class="navbar-nav ml-auto">
            <!--<a href="register/register.php" class="nav-item nav-link">Register</a>
            <a href="login/login.php" class="nav-item nav-link">Login</a>&nbsp;&nbsp;-->
            <?php if(isset($_SESSION['user_name'])) {
                        echo '<a href="profile.php" class="nav-item nav-link active"><i class="fa fa-user-o">  '.$_SESSION['user_name'].'</i></a>';
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
    
    <div class="text-center">
        <div style="background-color:black;color:white; height:4rem;">
            <p id="demo" class="p-3 m-5"></p>
        </div>
    </div>
    <!--timerend-->
    
    
    
    <!--start-->
    <div id="start" class="m-5">
        <div class="text-center m-5">
            <button type="button" class="btn btn-dark">Start Quiz</button>
        </div>
    </div>
    <!--start end-->    
</body>



<script>
// Set the date we're counting down to
var countDownDate = new Date("Oct 17, 2020 00:13:50").getTime();

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
    document.getElementById("start").style.display="none";
        
  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("start").style.display="block";
  }
}, 1000);
</script>

</html>
