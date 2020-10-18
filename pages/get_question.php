<?php

  	$c=$_SESSION['count'];
	$question=array();
	$user=$_SESSION['user_name'];
	
    function getRandint()
   	{
		$ans= rand(1,$c);
		 	return $ans;
    }

		
	
    	
?>
