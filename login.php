<?php
	include('header.php');
?>

<div class="parent">
	<div class="container child main_content">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-12 admin text-right">
				<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">
					<i class="fa fa-user"></i> Admin Login
				</button>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12">
				<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal1">
					<i class="fa fa-users"></i> User Login
				</button>
			</div>
		</div>
	</div>
</div>

<!-- Admin Modal -->
<div class="modal fade" id="myModal">
	<div class="modal-dialog ">
		<div class="modal-content lgndiv shadow-lg mb-5 bg-white rounded">
			<div class="modal-header p-0 bg-success" style="border-radius: 0px">
				<div class="container p-2">
					<label  class="text-white" style="font-size: 20px;">Admin Sign-in</label>
					<button type="button" class="close text-white font-weight-bold" data-dismiss="modal">&times;</button>
				</div>
			</div>
			<center>
				<form id="admin_login" method="post">
					<div class="modal-body">
						<div class="form-group">
							<input type="text" class="txtbox" name="admin_id" placeholder="Admin Id" />
						</div>
						<div class="form-group">
							<input type="password" class="txtbox" name="admin_pass" placeholder="Password" />
						</div>
					</div>
					<div class="modal-footer">
						<div class="form-group">
							<input type="submit" name="admin_submit" class="btn bg-success text-white" id="adminbtnlogin" value="Login" />
						</div>
					</div>
				</form>
			</center>
		</div>
	</div>
</div>
<!-- User Modal -->	
<div class="modal fade" id="myModal1">
	<div class="modal-dialog ">
		<div class="modal-content lgndiv shadow-lg mb-5 bg-white rounded">
			<div class="modal-header p-0 bg-success" style="border-radius: 0px">
				<div class="container p-2">
					<label  class="text-white" style="font-size: 20px;">User Sign-in</label>
					<button type="button" class="close text-white font-weight-bold" data-dismiss="modal">&times;</button>
				</div>
			</div>
			<center>
				<form id="user_login" method="post">
					<div class="modal-body">
						<div class="form-group">
							<input type="email" class="txtbox" name="user_id" placeholder="Email Id" />
						</div>
						<div class="form-group">
							<input type="password" class="txtbox" name="user_pass" placeholder="Password" />
						</div>
					</div>
					<div class="modal-footer">
						<div class="form-group">
							<input type="submit" name="user_submit" class="btn bg-success text-white" id="userbtnlogin" value="Login" />
						</div>
						<div class="form-group">
							<span class="text-primary">Not Registered ? <a href="register.php" class="text-uppercase text-primary font-weight-bold">Create an account</a></span>
						</div> 
					</div>
				</form>
			</center>
		</div>
	</div>
</div>
</div>
<?php
	include('footer.php');
?>

<script type="text/javascript" language="javascript" > 
$( "#admin_login" ).validate({
	rules: 
	{
		admin_id: 
		{
			required: true
		},
		admin_pass: 
		{
			required: true
		}
	},
	messages: 
	{
		admin_id: " Insert Admin ID<br/>",
		admin_pass: "Insert Password",
	}	
});	

$( "#user_login" ).validate({
	rules: 
	{
		user_id: 
		{
			required: true
		},
		user_pass: 
		{
			required: true
		}
	},
	messages: 
	{
		user_id: " Insert User ID<br/>",
		user_pass: "Insert Password",
	}	
});	
</script>

<?php
/* Admin Submission */
	if(isset($_POST["admin_submit"]))
	{
		$admin = "select * from admin";
		$adminResult = mysqli_query($con, $admin);
		if($adminRow = mysqli_fetch_array($adminResult))
		{
			if($_POST["admin_id"] == $adminRow["adminid"] && $_POST["admin_pass"] == $adminRow["adminpassword"])
			{
				$_SESSION["type"] = "admin";
				echo "<script>window.location.href='ManageCourse.php';</script>";
			}
			else
			{
				echo "<script>alert('Kindly insert correct credentials!');</script>";
			}
		}
	}
	
/* User Submission */
	if(isset($_POST["user_submit"]))
	{
		$user = "select * from user where uemail = '".$_POST["user_id"]."' and upassword = '".$_POST["user_pass"]."'";
		$userResult = mysqli_query($con, $user);
		if($userRow = mysqli_fetch_array($userResult))
		{
			$_SESSION["user_type"] = "user";
			$_SESSION["id"] = $userRow["uid"];
			$_SESSION["name"] = $userRow["uname"];
			echo "<script>window.location.href='user/TakeTest.php';</script>";
		}
		else
		{
			echo "<script>alert('Kindly insert correct credentials!');</script>";
		}	
	}
?>
</body>
</html>
