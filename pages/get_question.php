<?php

  $c=$_SESSION['count'];
	$question=array();
	$user=$_SESSION['user_name'];
	
    function getRandint()
   	{
		$ans= rand(1,$c);
		 	return $ans;
    }


	function getQuestion($user)
	{
			$r=getRandint();
			if(rowExists('matches','ques_no',$r))
			{
				getquestion();				
			}
			else
			{
				$res=$con->query("select * from quiz where ques_no='$r'");
				while($ele = $res->fetch_assco())
						$question[]=$ele['question'];
				
				$con->query("insert into matches(user_name,ques_no,status) values('$user','$question[0]',0)");
				
				return $r;
			}
	}

	function getUnsolved()
	{
		$res=$con->query("select * from matches where user_name='$user' order by status asc;");
		
		$checkques=array();
		
		while($ele = $res->fetch_assoc()){
			$ques_no[]=$ele['ques_no'];
			$checkques[]=$ele['status'];
		}
		
		$co=count($ques_no);
		
		if($co==0)
			return 0;
		else if($checkques[0])
		{
			$res=$con->query("select * from quiz where ques_no='$ques_no[0]'");
				while($ele = $res->fetch_assco())
						$question[]=$ele['question'];
			
			return 1;
		}
		else
		{
			return 0;	
		}
		
		
	}
    	
?>
