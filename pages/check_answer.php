<?php
	date_default_timezone_set('Asia/Kolkata');
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
      $con->query("update matches set status='1',end_time='$cur' where user_name='$user' and quiz_no='$ques_no'");
      
      $prev = $con->query("select start_time from matches where user_name='$user' and quiz_no='$num'")->fetch_assoc()['start_time'];
      
	  echo "before string to time<br>";
	  var_dump($prev);
		echo "  ";
	  var_dump($cur);
	  
      $prev=strtotime($prev);
      $cur =strtotime($cur);
	  
	  echo "<br>before string to time<br>";
	  var_dump($prev);
		echo "  ";
	  var_dump($cur);
	 
      $prev = new DateTime("@$prev");
      $cur = new DateTime("@$cur");
	  
	  echo "<br>new Date string to time<br>";
	  var_dump($prev);
		echo "  ";
	  var_dump($cur);
	  
      $diff = $cur->getTimestamp() - $prev->getTimestamp();
	  
	  echo "<br>diff<br>";
	  var_dump($diff);
	  
      $con->query("update user set points=points+1,rank=rank+'$diff' where user_name='$user'");
      //header("Location:quiz.php?ans=correct");
      //die(); 
  }
  else
  {
      header("Location:quiz.php?ans=wrong");
      die(); 
  }


?>
