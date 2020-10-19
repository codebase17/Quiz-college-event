<?php

    include_once '../header.php';
    include_once 'get_question.php';
    session_start();
    $user=$_SESSION['user_name'];  

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
	
  	$ans=$_GET['ans'];
	
	if($user)
	{
		if(($ans!="correct")||($ans!="wrong"))
		{
			getQuestion();	
		}
			
		$question=$_SESSION['question'];
		$ques_no=$_SESSION['ques_no'];
		

  
	echo '<div class="text-center m-4">
		<div class="row">
			<div class="col-lg-6 col-xs-2 col-sm-2 col-md-2">
				<img src="../assets/<?=$ques_no>.jpg" class="d-block img-fluid views" alt="image">
			</div>
			<div class="col-lg-6 col-xs-2 col-sm-2 col-md-2">
				<p class="m-4">'.$question.'</p>
				
				<form method="POST" action="check_answer.php" onsubmit="disableButton()">
				<div class="form-group">
       				<input type="text" class="form-control" id="inputanswer" placeholder="Enter answer" name="answer" required>
   				</div>';
				
				/*if($ans=="correct")
				{
					echo '<h3><span class="badge badge-success">Correct</span></h3>';
					//echo '<a href="quiz.php?ans=next"><button type="button" class="btn btn-primary m-4">NEXT</button></a>';
					echo '<button type="submit" name="next" class="btn btn-dark">NEXT</button>';
				}
				else*/ if($ans=="wrong")
				{
					echo '<h3><span class="badge badge-danger">Wrong</span></h3>';
					echo '<button type="submit" name="checkanswer" id="itscorrect" class="btn btn-dark">SUBMIT</button>';
				}
				else{
					echo '<button type="submit" name="checkanswer" id="itscorrect" class="btn btn-dark">SUBMIT</button>';
				}
				
				echo '
				</form>
				
			</div>
		</div>
	</div>';
  	 }
	
	else
	{
		echo'
			<div class="text-center m-4">
		<div class="container">
			<p class="m-4">You are not Logged in :< </p>
		</div>
	</div>
		';
	}
	
	?>
	
	
</body>
<script>
    function disableButton() {
        var btn = document.getElementById('itscorrect');
        btn.disabled = true;
        btn.innerText = 'checking...'
    }
</script>
<style>
	@media (min-width:320px)  { .views{} /* smartphones, iPhone, portrait 480x320 phones */ }
	@media (min-width:481px)  { .views{} /* portrait e-readers (Nook/Kindle), smaller tablets @ 600 or @ 640 wide. */ }
    	@media (min-width:641px)  { .views{} /* portrait tablets, portrait iPad, landscape e-readers, landscape 800x480 or 854x480 phones */ }
	@media (min-width:961px)  { .views{ object-fit: cover;width: 100%;height: 450px; } /* tablet, landscape iPad, lo-res laptops ands desktops */ }
	@media (min-width:1025px) { .views{ object-fit: cover;width: 100%;height: 450px;} /* big landscape tablets, laptops, and desktops */ }
	@media (min-width:1281px) { .views{ object-fit: cover;width: 100%;height: 450px;} /* hi-res laptops and desktops */ }
</style>

</html>
