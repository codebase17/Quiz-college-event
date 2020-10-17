<?php

  include '../header.php';
  
if($_SESSION['user_name']!="groot"){
	echo "<h1>Fuck Off Bitch</h1>";	
}
else{
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
  
  
  
  <?php
    $added=$_GET['added'];
  ?>
  <div class="container mt-2 mb-2">
       <div class="text-center">
           <?php
            if($added=="yes")
                echo "<h5>Question Added Successfully</h5>";
            else
                echo "<h5>Question Not added</h5>";
           ?>
        </div>
     </div>
  
<?php
	
    $con=getCon();
    $res=$con->query("select * from quiz"); 
     
     $question_no=array();
     $question=array();
     $answers=array();
     
     while($ele = $res->fetch_assoc()){
	     $question_no[]=$ele['ques_no'];
	      $question=$ele['question'];
     		$answers=$ele['answer'];
	     
     }
     
     $c=count($question_no);
     
	?>

<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">question no</th>
      <th scope="col">question</th>
      <th scope="col">answer</th>
    </tr>
  </thead>
  <tbody>
	  <? for($i=0;$i<$c;$i++){ ?>
    <tr>
      <td><?=$question_no[$i]?></td>
      <td><?=$question[$i]?></td>
      <td><?=$answer[$i]?></td>
    </tr>
	  <? } ?>
  </tbody>
</table>	
	
	
	
	
  </body>
  </html>

<? } ?>
