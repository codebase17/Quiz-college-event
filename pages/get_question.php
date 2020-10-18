<?php

	include_once '../header.php';
	session_start();
?>

<?php 
	function getQuestionNumbers()
	{
		$user=$_SESSION['user_name'];
		$con=getCon();
    		$nums=Array();
    		$res = $con->query("select ques_no from quiz");
    		while($num = $res->fetch_assoc())
        		$nums[] = $num['ques_no'];
		
		/*echo "Number of total questions<br>";
		print_r($nums);
		echo "<br>";*/
		
		return $nums;
	}
	
	function getAllotedQuestions($user)
	{
		$user=$_SESSION['user_name'];
		$con=getCon();
    		$nums = Array();
    		$con = getCon();
    		$res = $con->query("select quiz_no as number from matches where user_name='$user'");
		
    		foreach($res as $row)
        		$nums[] = $row['number'];
		
		/*echo "Number of given questions<br>";
		print_r($nums);
		echo "<br>";*/
		
    		return $nums;
	}

	function get_last()
	{
		//echo "in getlast function now<br>";
		$user=$_SESSION['user_name'];
		$con=getCon();
    		$res=$con->query("select quiz_no as n from matches where user_name='$user' and status='0'")->fetch_assoc()['n'];
		
		//echo $res."<br>";
		
    		if($res=="")
        		return [False];
    		else
        		return [True,$res];
	}

	function give($num)
	{
		//echo "in give function now<br>";
		$user=$_SESSION['user_name'];
		$con=getCon();
   	 	$q = $con->query("select question from quiz where ques_no='$num'")->fetch_assoc()['question'];
    		$_SESSION['question']=$q;
		
		$echo $_SESSION['question'];
	}

	function write_to_db($number)
	{
		//echo "in write to db function now<br>";
		//echo "number is ".$number."<br>";
		$SESSION['ques_no']=$number;
		
		$user=$_SESSION['user_name'];
		$con=getCon();
    		$con->query("insert into matches(user_name,quiz_no,status) values('$user','$number','0')");
	}
	
	function getQuestion()
	{
		//echo "in getQuestion function now<br>";
		$user=$_SESSION['user_name'];
		$con=getCon();
    	$all_q = getQuestionNumbers();
    	$all_given = getAllotedQuestions($user);
		
    	$last = get_last();
		
    	if($last[0])
    	{
        	give($last[1]);
        	die();
    	}
    	else
    	{
        	$rem = array_diff($all_q,$all_given);
        	if($rem==[])
        	{
            	header("Location:last_page.php");
            	die();
        	}
			
        	$rand_index = array_rand($rem);
			
        	$new_quiz = $rem[$rand_index];
			
        	write_to_db($new_quiz);
			
		give($new_quiz);
        	die();
    	}
	}
	getQuestion();	
?>
