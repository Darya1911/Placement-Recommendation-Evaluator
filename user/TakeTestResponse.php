<?php
session_start();
include('../connection.php');
if($_POST["operation"] == "apti")
{
	$gkcount = 0;
	$englishcount = 0;
	$mathcount = 0;
	$str1 = "";
	
	for($i=1; $i<=5; $i++)
	{
		if(isset($_POST["option".$i.""]))
		{
			$id = $_POST["questionid".$i.""];
			$str = trim($_POST["option".$i.""], " ");
			$select = "select answer from question where qid = '".$id."'";
			$result = mysqli_query($con, $select);
			$row = mysqli_fetch_array($result);
			$finalanswer = trim($row["answer"], " ");
			if($str == $finalanswer)
			{
			$gkcount = $gkcount+1;
			}
		}
	}
	for($i=6; $i<=10; $i++)
	{
		if(isset($_POST["option".$i.""]))
		{
			$id = $_POST["questionid".$i.""];
			$str1 = trim($_POST["option".$i.""], " ");
			$select1 = "select answer from question where qid = '".$id."'";
			$result1 = mysqli_query($con, $select1);
			$row1 = mysqli_fetch_array($result1);
			$finalanswer1 = trim($row1["answer"], " ");
			if($str1 == $finalanswer1)
			{
				$englishcount = $englishcount + 1;
			}
		}
	}
	for($i=11; $i<=15; $i++)
	{
		if(isset($_POST["option".$i.""]))
		{
			$id = $_POST["questionid".$i.""];
			$str2 = trim($_POST["option".$i.""], " ");
			$select2 = "select answer from question where qid = '".$id."'";
			$result2 = mysqli_query($con, $select2);
			$row2 = mysqli_fetch_array($result2);
			$finalanswer2 = trim($row2["answer"], " ");
			if($str2 == $finalanswer2)
			{
				$mathcount = $mathcount + 1;
			}
		}
	}
	
	$r = $gkcount . ", " . $englishcount . ", " . $mathcount;
	$sum = ($gkcount + $englishcount + $mathcount);
	
	$update = "update result set aptiscore = '".$r."' where uid='".$_SESSION["id"]."'";
	$upresult = mysqli_query($con, $update);

	$selectcourse = $_POST["selectcourse"];
	$courseselect = "";
	
	$courseselect .= "select * from question where qtype = 'course' and typename='".$selectcourse."' ";
	if($sum < 7)
	{
		$courseselect .= "and qlevel = 'level 1' ";
	}
	else
	{
		$courseselect .= "and qlevel = 'level 2' ";
	}
	$courseselect .= "ORDER by rand() LIMIT 15";
	$courseresult = mysqli_query($con, $courseselect);
	$j = 1;
	while($courserow = mysqli_fetch_array($courseresult))
	{
		$str1 .= "<p>Q.".$j.") ".$courserow["qname"]."</p>";
		$str1 .= "<div class='row'>
		<input type='text' name='totalAptiScore' id='totalAptiScore' value='".$sum."' style='display: none;'/>
		<input type='text' name='courseQuestionid".$j."' value='".$courserow["qid"]."' style='display: none;'/>
		<div class='col-md-3'>
		<input type='radio' name='courseoption".$j."' value='".$courserow["option1"]."'/> ".$courserow["option1"]."
		</div>
		<div class='col-md-3'>
		<input type='radio' name='courseoption".$j."' value='".$courserow["option2"]."'/> ".$courserow["option2"]."
		</div>
		<div class='col-md-3'>
		<input type='radio' name='courseoption".$j."' value='".$courserow["option3"]."'/> ".$courserow["option3"]."
		</div>
		<div class='col-md-3'>
		<input type='radio' name='courseoption".$j."' value='".$courserow["option4"]."'/> ".$courserow["option4"]."
		</div>
		<div class='col-md-12'>
		<br/>
		</div>
		<div class='col-md-12'>
		<button class='btn btn-info form-control coursework' id='".$j."' type='button' onClick='reply_click(this.id)'>Workspace</button>
		</div>
		<div class='col-md-12' id='coursespace".$j."' style='display: none;'>
		<div class='text-center px-5 py-4' style='background-color: #17a2b8c9;'>
		<center>
		<textarea  class='form-control' rows='5' style='width: 75%;'></textarea>
		</center>
		</div>
		</div> 
		</div>";
		$str1 .= "<br/>";
		$j++;
	}
	echo $str1;
}

else
{
	$count = 0;
	$first = "";
	$second = "";
	
	for($i=1; $i<=15; $i++)
	{
		if(isset($_POST["courseoption".$i.""]))
		{
			$id = $_POST["courseQuestionid".$i.""];
			$str = trim($_POST["courseoption".$i.""], " ");
			$select = "select answer from question where qid = '".$id."'";
			$result = mysqli_query($con, $select);
			$row = mysqli_fetch_array($result);
			$finalanswer = trim($row["answer"], " ");
			$first .= $str . ", ";
			$second .= $finalanswer . ", ";
			if($str == $finalanswer)
			{
				$count++;
			}
		}
	}

	$update = "update result set coursescore = '".$count."' where uid='".$_SESSION["id"]."'";
	$upresult = mysqli_query($con, $update);
	echo "Submitted Successfully";
}
?>