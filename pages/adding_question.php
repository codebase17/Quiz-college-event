<?php

    session_start();
    include '../header.php';
    $con=getCon();
    
    $ques_no=$_POST['ques_no'];
    $question=$_POST['question'];
    $answer=$_POST['answer'];
    
    
   if ($_SESSION['user_name']=="admin") {
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
        echo "<h1>Apologies you are not admin</h1>";
    }
    

?>
