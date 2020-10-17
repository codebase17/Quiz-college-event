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
	          <a href="#" class="nav-item nav-link active">Leaderboard</a>	
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
  
  
  
  <!--leaderboard-->
  
  <div class='jumbotron text-center'>
        <h1 class="">Hall Of Fame</h1>
    </div>

   <div class='container mt-3'>
       <table class='table '>
           <thead class='thead-dark'>
                <tr>
                    <th>Rank</th>
                    <th>User</th>
                    <th>Points</th>
                </tr>
           </thead>
      <?  ?>
           <tr>
               <td>1</td>
               <td>root</td>
               <td>99</td>
           </tr>
      <?  ?>
       </table>
   </div>

  
  <!--leaderend-->
  
  
  
  
  
</body>
</html>
