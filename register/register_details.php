<?php

  include '../libraries/essentials.php';
  if(isset($_POST['register_user'])){
  $con=getCon();

  $name=$_POST['name'];
  $collegename=$_POST['collegename'];
  $course=$_POST['course'];
  $contact=$_POST['contact'];

  $u = $_POST['user_name'];
  $e = $_POST['email'];
  $p = $_POST['password'];
  $p = password_hash($p,PASSWORD_DEFAULT);

  
  if(rowExists('user','user_name',$u)){
    $userexists=true;
    header("Location:register.php?userexists=".$userexists);
      die();
    
  }
  else if(rowExists('user','email',$e)){
    $emailexists=true;
     header("Location:register.php?emailexists=".$emailexists);
      die();
    
  }
    else
    {
      if(($con->query("insert into user(user_name,email,password,name,college_name,course,number) values('$u','$e','$p','$name','$collegename','$course','$contact');"))===True)
      {
          header("Location:../login/login.php");
          die();
      }
      else
      {
         $error=true;
          header("Location:register.php?error=".$error);
          die();
      }
    }
  }
?>
