<?php

    session_start();
    include '../header.php';
    
    
    $ques_no=$_POST['ques_no'];
    $question=$POST['question'];
    $answer=$POST['answer'];
  
   if (isset($_SESSION['user_name']=="groot")) {
    if (isset($_POST['add_question'])) {
    
      if(($con->query("insert into quiz(ques_no,question,answer) values('".mysqli_real_escape_string($con,$ques_no)."','".mysqli_real_escape_string($con,$question)."','".mysqli_real_escape_string($con,$answer)."')"))===True){
                header("Location:added_question.php?added=yes");
                die();
        }
        else{
                header("Location:added_question.php?added=no");
                echo $con->error;
        }
    }
    }
    else
    {
        echo "<h1>FUCK OFF BITCH!!</h1>";
    }
    

?>
