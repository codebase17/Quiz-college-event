<?php

    session_start();
    include_once 'header.php';

?>

<body>
    
  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a href="index.php" class="navbar-brand">Quiz Application</a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav">
            <a href="index.php" class="nav-item nav-link">Home</a>
	          <a href="pages/leaderboard.php" class="nav-item nav-link">Leaderboard</a>	
            <a href="about.php" class="nav-item nav-link">About</a>
        </div>
        <div class="navbar-nav ml-auto">
            <?php if(isset($_SESSION['user_name'])) {
                        echo '<a href="#" class="nav-item nav-link active"><i class="fa fa-user-o">  '.$_SESSION['user_name'].'</i></a>';
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
   
 <div class="jumbotron">
        <div class="text-center">
            <?php if(isset($_SESSION['user_name'])&&$_SESSION['user_name']=="groot"){
                            
			echo'
			<div id="start" class="m-4">
        			<div class="text-center m-4">
            			<a href="pages/add_question.php"><button type="button" class="btn btn-dark m-4">Add question</button></a>
				<a href="pages/added_question.php"><button type="button" class="btn btn-dark m-4">View questions</button></a>
       				 </div>
   			 </div>
			';
	
                    }
                    else if(isset($_SESSION['user_name'])){ 
                        echo '<h1 class="display-4"> username : '.$_SESSION['user_name'].'</h1>';
			    
			 $con=getCon();
			 
			 $points=Array();
			    
			 $user=$_SESSION['user_name'];
			 $res=$con->query("select points from user where user_name = '$user'");
			    
			 while($ele = $res->fetch_assoc())
			 {
				$points[]=$ele['points'];
			 }
			    
			 echo '<p>'.$points[0].'</p>';
			 
			    
			    
                    }
                    else
                    {
                        header("Location:index.php");
                        die();
                    }
            ?>
        </div>
    </div> 
	
	
  
</body>
</html>
