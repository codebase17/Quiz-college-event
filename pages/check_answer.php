<?php

	include_once '../header.php';
	session_start();
?>

<?php 
	
	$con=getCon();
  $user=$_SESSION['user_name'];
  $ques_no=$_SESSION['ques_no'];
  $answer=$_POST['answer'];

	/*var_dump($ques_no);
	echo "<br>";
	var_dump($answer);*/

  $correct=$con->query("select answer from quiz where ques_no='$ques_no'")->fetch_assoc()['answer'];
  if($answer==$correct)
  {
    
      $cur = date("Y-m-d H:i:s");
      $con->query("update matches set status='1',endtime='$cur' where user_name='$user' and quiz_no='$ques_no'");
      
      $prev = $con->query("select starttime from matches where user_name='$user' and quiz_no='$num'")->fetch_assoc()['starttime'];
      $prev=strtotime($prev);
      $cur =strtotime($cur);
      $prev = new DateTime("@$prev");
      $cur = new DateTime("@$cur");
      $diff = $cur->getTimestamp() - $prev->getTimestamp();
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
