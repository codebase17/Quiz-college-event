<?php

    session_start();
    include '../header.php';


	if($_SESSION['user_name']!="admin"){
		echo "<h1>Apologies you are not admin<h/1>";
		
	}
	else{
?>

<body>
    
  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a href="../index.php" class="navbar-brand">Quiz Application</a>
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
  
  
	
<?php
	
  $con=getCon();
  
  $res=$con->query("select ques_no from quiz;");
  
  $counting=array();
  while($ele = $res->fetch_assoc())
      $counting[]=$ele['ques_no'];
     
   $c=count($counting);
	
?>
  
  
  
 <form class="jumbotron m-4" method="POST" action="adding_question.php">
     <div class="form-group">
        <label for="inputqno">question number</label>
        <input type="text" class="form-control" id="inputqno" placeholder="qno" value="<?=$c+1?>" name="qno" disabled required>
    </div>
    <div class="form-group">
        <label for="inputquestion">Question</label>
        <input type="text" class="form-control" id="inputquestion" placeholder="question" name="question" required>
    </div>
    <div class="form-group">
        <label for="inputanswer">Answer</label>
        <input type="text" class="form-control" id="inputanswer" placeholder="answer" name="answer" required>
    </div>
    <input type="hidden" name="ques_no" value="<?php echo $c+1; ?>">  
    <button type="submit" name="add_question" class="btn btn-dark">Add question</button>
</form>
  
  
  
  
</body>
</html>

<? } ?>
