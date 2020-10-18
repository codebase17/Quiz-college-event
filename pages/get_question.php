<?php

	include '../header.php';
	session_start();
  	$c=$_SESSION['count'];
	$user=$_SESSION['user_name'];

	function getQuestionNumbers()
	{
		$con=getCon();
    		$nums=Array();
    		$res = $con->query("select ques_no from quiz");
    		while($num = $res->fetch_assoc())
        		$nums[] = $num['ques_no'];
		return $nums;
	}
	
	function getAllotedQuestions($user)
	{
		$con=getCon();
    		$nums = Array();
    		$con = getCon();
    		$res = $con->query("select quiz_no as number from matches where user_name='$user'");
    		echo $con->error;
		
    		foreach($res as $row)
        		$nums[] = $row['number'];
    		return $nums;
	}

	function get_last()
	{
		$con=getCon();
    		$res=$con->query("select quiz_no as n from matches where user_name='$user' and status='0'")->fetch_assoc()['n'];
    		if($res=="")
        		return [False];
    		else
        		return [True,$res];
	}

	function give($num)
	{
		$con=getCon();
   	 	$q = $con->query("select question from quiz where number='$num'")->fetch_assoc()['question'];
    		$_SESSION['question']=$q;
		header("Location:quiz.php?picnum=".$num);
	}

	function write_to_db($number)
	{
		$con=getCon();
    		$con->query("insert into matches(user_name,quiz_no,status) values('$user','$number','0')");
	}
	
	function getQuestion()
	{
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
