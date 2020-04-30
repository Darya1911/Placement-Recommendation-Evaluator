<?php
session_start();
include('connection.php');
if(isset($_SESSION["user_type"]))
{
	$delete = "delete from addtocart where userid='".$_SESSION["id"]."'";
	$dresult = mysqli_query($con, $delete);
}
session_destroy();
echo "<script>window.location.href = 'login.php';</script>";
?>