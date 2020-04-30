<?php
include("connection.php");
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{ 
		$qtype = $_POST["qtype"];
		$typename = $_POST["typename"];
		$level = $_POST["level"];
		$edit_question = mysqli_real_escape_string($con, $_POST["edit_question"]);
		$edit_option1 = mysqli_real_escape_string($con, $_POST["edit_option1"]);
		$edit_option2 = mysqli_real_escape_string($con, $_POST["edit_option2"]);
		$edit_option3 = mysqli_real_escape_string($con, $_POST["edit_option3"]);
		$edit_option4 = mysqli_real_escape_string($con, $_POST["edit_option4"]);
		$edit_answer = mysqli_real_escape_string($con, $_POST["edit_answer"]);
		$edit_marks = $_POST["edit_marks"];

		$query2 = "INSERT INTO question(qname, qlevel, option1, option2, option3, option4, answer, qtype, typename, marks) VALUES ('".$edit_question."', '".$level."','".$edit_option1."','".$edit_option2."','".$edit_option3."','".$edit_option4."','".$edit_answer."','".$qtype."','".$typename."','".$edit_marks."')";
		if(mysqli_query($con, $query2))
		{
			echo 'Question Added Successfully';
		}
	}
	else if($_POST["operation"] == "delete")
	{
		$query = "SELECT * FROM question WHERE qid = '".$_POST["qid"]."'";
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_array($result);
		$output["qid"] = $row["qid"];
		$output["qname"] = $row["qname"];
		echo json_encode($output);
	}
}

else if(isset($_POST["delOperation"]))
{
	$query = "DELETE FROM question WHERE qid = '".$_POST["delid"]."'";
	if(mysqli_query($con, $query))
	{
		echo 'Question Deleted Successfully';
	}
}

else
{
	$query = '';
	$data = array();
	$records_per_page = 10;
	$start_from = 0;
	$current_page_number = 0;
	if(isset($_POST["rowCount"]))
	{
		$records_per_page = $_POST["rowCount"];
	}
	else
	{
		$records_per_page = 10;
	}
	if(isset($_POST["current"]))
	{
		$current_page_number = $_POST["current"];
	}
	else
	{
		$current_page_number = 1;
	}
	$start_from = ($current_page_number - 1) * $records_per_page;
	$query .= "SELECT * FROM question ";
	if(!empty($_POST["searchPhrase"]))
	{
		 $query .= 'WHERE (qname LIKE "%'.$_POST["searchPhrase"].'%" ';
		 $query .= 'OR qtype LIKE "%'.$_POST["searchPhrase"].'%" ';
		 $query .= 'OR typename LIKE "%'.$_POST["searchPhrase"].'%" ) ';
	} 
	else
	{ 
		$query .= 'ORDER BY qid DESC ';
	} 
	if($records_per_page != -1)
	{
		$query .= " LIMIT " . $start_from . ", " . $records_per_page;
	}
	$result = mysqli_query($con, $query);
	$query1 = "SELECT * FROM `question`";
	$result1 = mysqli_query($con, $query1);
	$total_records = mysqli_num_rows($result1);
	
	while($row = mysqli_fetch_assoc($result))
	{
		$option = $row["option1"] . ", " . $row["option2"] . ", " . $row["option3"] . ", " . $row["option4"];
		$qtype = $row["qtype"] . "(". $row["typename"] .")";
		$data[] = array("qid" => $row["qid"],
		"qname" => $row["qname"],
		"qlevel" => $row["qlevel"],
		"option" => $option,
		"answer" => $row["answer"],
		"qtype" => $qtype,
		);
	}
	
		$output = array(
	 'current'  => intval($_POST["current"]),
	 'rowCount'  => $total_records,
	 'total'   => intval($total_records),
	 'rows'   => $data
	);
	echo json_encode($output);
} 
?>