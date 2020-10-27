<?php
  
  include_once '../header.php';
  include_once '../libraries/essentials.php';
  session_start();
  
  $answer = $_POST['ans'];  
  if ($answer == "ans1") {          
    echo 'Correct';      
   }
  else
  {
    echo 'Incorrect';
  }    

?>
