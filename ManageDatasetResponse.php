<?php
include("connection.php");
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{ 
		$edit_backlogs = $_POST["edit_backlogs"];
		$edit_aggregate = $_POST["edit_aggregate"];
		$edit_aptitude = $_POST["edit_aptitude"];
		$edit_course = $_POST["edit_course"];
		$edit_cgpi = mysqli_real_escape_string($con, $_POST["edit_cgpi"]);
		$edit_name = mysqli_real_escape_string($con, $_POST["edit_name"]);
		$edit_skill = mysqli_real_escape_string($con, $_POST["edit_skill"]);

		$query2 = "INSERT INTO dataset(cgpi, backlogs, aggregate, skill, aptiscore, coursescore, coursename) VALUES ('".$edit_cgpi."', '".$edit_backlogs."','".$edit_aggregate."','".$edit_skill."','".$edit_aptitude."','".$edit_course."','".$edit_name."')";
		if(mysqli_query($con, $query2))
		{
			echo 'Data Set Added Successfully';
		}
	}
	else if($_POST["operation"] == "delete")
	{
		$query = "SELECT * FROM dataset WHERE did = '".$_POST["did"]."'";
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_array($result);
		$output["did"] = $row["did"];
		echo json_encode($output);
	}
}

else if(isset($_POST["delOperation"]))
{
	$query = "DELETE FROM dataset WHERE did = '".$_POST["delid"]."'";
	if(mysqli_query($con, $query))
	{
		echo 'Dataset Deleted Successfully';
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
	$query .= "SELECT * FROM dataset ";
	if(!empty($_POST["searchPhrase"]))
	{
		 $query .= 'WHERE (coursename LIKE "%'.$_POST["searchPhrase"].'%" ) ';
	} 
	else
	{ 
		$query .= 'ORDER BY did ASC ';
	} 
	if($records_per_page != -1)
	{
		$query .= " LIMIT " . $start_from . ", " . $records_per_page;
	}
	$result = mysqli_query($con, $query);
	$query1 = "SELECT * FROM `dataset`";
	$result1 = mysqli_query($con, $query1);
	$total_records = mysqli_num_rows($result1);
	
	while($row = mysqli_fetch_assoc($result))
	{
		$data[] = $row;
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