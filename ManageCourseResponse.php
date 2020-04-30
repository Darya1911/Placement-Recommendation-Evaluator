<?php
include("connection.php");
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{ 
		$edit_id = $_POST["edit_cid"];
		$edit_name = $_POST["edit_cname"];

		$edit_name = mysqli_real_escape_string($con, $edit_name);
		
		$query2 = "INSERT INTO course(cid, cname) VALUES ('".$edit_id."', '".$edit_name."')";
		if(mysqli_query($con, $query2))
		{
			echo 'Course Added Successfully';
		}
	}
	
	else if($_POST["operation"] == "edit_courseModal")
	{ 
		$query = "SELECT * FROM `course` WHERE cid = '".$_POST["cid"]."'";
		$result = mysqli_query($con, $query);
		while($row = mysqli_fetch_array($result))
		{
			$output["cid"] = $row["cid"];
			$output["cname"] = $row["cname"];
		}
		echo json_encode($output);
	}
	
	else if($_POST["operation"] == "Edit")
	{
		$edit_id = $_POST["edit_cid"];
		$edit_name = $_POST["edit_cname"];
		
		$edit_name = mysqli_real_escape_string($con, $edit_name);
		
		$query = "UPDATE `course` SET `cname`='".$edit_name."' WHERE `cid` = ".$edit_id." ";
		if(mysqli_query($con, $query))
		{
			echo 'Course Updated Successfully';
		}
	}
	else if($_POST["operation"] == "delete")
	{
		$query = "SELECT * FROM course WHERE cid = '".$_POST["cid"]."'";
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_array($result);
		$output["cid"] = $row["cid"];
		$output["cname"] = $row["cname"];
		echo json_encode($output);
	}
}

else if(isset($_POST["delOperation"]))
{
	$query = "DELETE FROM course WHERE cid = '".$_POST["delid"]."'";
	if(mysqli_query($con, $query))
	{
		echo 'Course Deleted Successfully';
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
	$query .= "SELECT * FROM course ";
	if(!empty($_POST["searchPhrase"]))
	{
		 $query .= 'WHERE (cname LIKE "%'.$_POST["searchPhrase"].'%" ) ';
	} 
	else
	{ 
		$query .= 'ORDER BY cid ASC ';
	} 
	if($records_per_page != -1)
	{
		$query .= " LIMIT " . $start_from . ", " . $records_per_page;
	}
	$result = mysqli_query($con, $query);
	$query1 = "SELECT * FROM `course`";
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