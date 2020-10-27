<?php
	include_once '../header.php';
	session_start();
?>

<?php 
	
	$con=getCon();
  $user=$_SESSION['user_name'];
  $ques_no=$_SESSION['ques_no'];
  $answer=$_POST['answer'];
  $answer1=trim(strtolower($_POST['answer']));

  $correct=$con->query("select answer from quiz where ques_no='$ques_no'")->fetch_assoc()['answer'];
  $correct1=trim(strtolower($correct));

  if(($answer==$correct)||($answer1==$correct1))
  {
    
      $cur = date("Y-m-d H:i:s");
      $con->query("update matches set status='1',end_time='$cur' where user_name='$user' and quiz_no='$ques_no'");
      
      $prev = $con->query("select start_time from matches where user_name='$user' and quiz_no='$num'")->fetch_assoc()['start_time'];
	  
      $prev = strtotime($prev);
      $cur = strtotime($cur);
	
      $diff = $cur - $prev;
	 
      $con->query("update user set points=points+1,rank=rank+'$diff' where user_name='$user'");
      header("Location:quiz.php?ans=correct");
      die(); 
  }
  else
  {
      header("Location:quiz.php?ans=wrong");
      die(); 
  }


?>
