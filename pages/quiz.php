<?php

    session_start();
    include '../header.php';


	$c=$_SESSION['count'];
	$question=array();

    function getRandint()
   	{
		$ans= rand(1,$c);
		 	return $ans;
    }


	function getQuestion()
	{
			$r=getRandint();
			if(rowExists('quiz','ques_no',$r))
			{
				getquestion();				
			}
			else
			{
				$res=$con->query("select * from quiz where ques_no='$r'");
				while($ele = $res->fetch_assco())
						$question[]=$ele['question'];
				
				$user=$_SESSION['user_name'];
				$con->query("insert into matches(user_name,ques_no,status) values('$user','$question[0]',0)");
				
				return $r;
			}
	}

	function getUnsolved()
	{
		$res=$con->query("select * from matches order by status asc;");
		
		$checkques=array();
		
		while($ele = $res->fetch_assoc()){
			$ques_no[]=$ele['ques_no'];
			$checkques[]=$ele['status'];
		}
		
		if($checkques[0])
		{
			$res=$con->query("select * from quiz where ques_no='$ques_no[0]'");
				while($ele = $res->fetch_assco())
						$question[]=$ele['question'];
			
			return 1;
		}
		else
		{
			return 0;	
		}
		
		
	}
    	
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
		getQuestion();	
	}
	else
	{
		getUnsolved();	
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
