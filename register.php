<?php
	include('header.php');
?>

<div class="container my-4">
	<div class="row">
		<div class="col-lg-2 col-md-2 col-sm-12">
		</div>
		<div class="col-lg-8 col-md-8 col-sm-12">
			<div class="lgndiv shadow-lg p-3 mb-5 bg-white rounded">
				<form method="post" id="registration_form">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<h3>Create your Account</h3>
							</div>
						</div>
						<div class="col-md-12">
							<hr/>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<p class="font-weight-bold text-left" style="font-size:18px;">Personel Details :</p>
								<hr class="text-white" style="width:24%;margin: 0;border-top: 3px solid white;margin-bottom:20px;" />
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<input type="text" name="fname" placeholder="First Name" class="txtbox" />
							</div> 
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<input type="number" name="phone" placeholder="Mobile Number" class="txtbox"/>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group"> 
								<input type="number" name="age" placeholder="Age" class="txtbox" />
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<input type="password" name="password" placeholder="Password" class="txtbox" />
							</div>
						</div>
						<div class="col-md-8">
							<div class="form-group">
								<input type="email" name="email" placeholder="Email Address" class="txtbox" />
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group"> 
								<textarea type="text" name="address" placeholder="Address" class="txtbox"></textarea>
								<br/>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<p class="font-weight-bold text-left" style="font-size:18px;">Gender :</p>
							</div>
							<div class="form-group text-left">
								<label class="radio-inline"><input type="radio" name="gender" value="male" /> &nbsp;Male</label>&nbsp;&nbsp;
								<label class="radio-inline"><input type="radio" name="gender" value="female" /> &nbsp;Female</label>
							</div>
						</div>
						<div class="col-md-12">
							<hr/>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<p class="font-weight-bold text-left" style="font-size:18px;">Education Details :</p>
								<hr class="text-white" style="width:24%;margin: 0;border-top: 3px solid white;margin-bottom:20px;" />
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<input type="text" name="cgpi" placeholder="CGPI" class="txtbox" />
							</div> 
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<input type="text" name="backlogs" placeholder="BackLogs" class="txtbox" />
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group"> 
								<input type="text" name="aggregate" placeholder="Aggregate % (10 n 12)" class="txtbox" />
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group"> 
								<textarea type="text" name="skill" placeholder="Skills" class="skill"></textarea>
								<br/>
							</div>
						</div>
						<div class="col-md-12">
							<hr/>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<input type="submit" name="submit" class="btn bg-success text-white" id="btnlogin" value="Register" />
							</div>
							<div class="form-group">
								<label>Already Have An Account ? </label> <a href="login.php" class="text-uppercase font-weight-bold">Sign In</a>
							</div> 
						</div>
					</div>
				</form>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-12">
			</div>
		</div>
	</div>
</div>

</div>
<?php
	include('footer.php');
?>
<script type="text/javascript" language="javascript" >
	$( "#registration_form" ).validate({
		rules: 
		{
			fname: 
			{
				required: true
			},
			mname: 
			{
				required: true
			},
			lname:
			{
				required: true
			},
			address:
			{
				required: true
			},
			phone:
			{
				required: true
			},
			age:
			{
				required: true
			},
			password:
			{
				required: true
			},
			email:
			{
				required: true
			},
			gender:
			{
				required: true
			},
			cgpi:
			{
				required: true
			},
			backlogs:
			{
				required: true
			},
			aggregate:
			{
				required: true
			},
			skill:
			{
				required: true
			}
		},
		messages: 
		{
			fname: " * Insert First Name<br/>",
			mname: " * Insert Middile Name<br/>",
			lname: " * Insert Last Name<br/>",
			address: "* Insert Address",
			phone: "* Insert Contact Number",
			age: "* Insert age",
			password: "* Insert Password",
			email: "* Insert Email",
			gender: "* Select Gender",
			cgpi: "* Enter CGPI",
			backlogs: "* Enter Backlogs",
			aggregate: "* Enter Aggregate",
			skill: "* Enter Skill",
		},
		errorPlacement: function(error, element) {
			if ( element.is(":radio") ) 
			{
				error.prependTo( element.parent().parent() );
			}
			else 
			{ 
				error.insertAfter( element );
			}
		}
	});
</script>

<?php
if(isset($_POST["submit"]))
{
	$select = "select * from user where uemail = '".$_POST["email"]."'";
	$result1 = mysqli_query($con, $select);
	$count = mysqli_num_rows($result1);
	if($count != 0)
	{
		echo "<script>alert('You have already registered');</script>";
	}
	else
	{
		$id = "";
		$selectid = "SELECT uid FROM `user` ORDER by uid desc LIMIT 1";
		$idresult = mysqli_query($con, $selectid);
		if($idrow = mysqli_fetch_array($idresult))
		{
			$id = $idrow["uid"] + 1;
		}
		else
		{
			$id = 1001;
		}
		
		$address = mysqli_real_escape_string($con, $_POST['address']);
		$name = mysqli_real_escape_string($con, $_POST['fname']);
		$email = mysqli_real_escape_string($con, $_POST['email']);
		$password = mysqli_real_escape_string($con, $_POST['password']);
		$cgpi = mysqli_real_escape_string($con, $_POST['cgpi']);
		$backlogs = mysqli_real_escape_string($con, $_POST['backlogs']);
		$aggregate = mysqli_real_escape_string($con, $_POST['aggregate']);
		$skill = mysqli_real_escape_string($con, $_POST['skill']);
		
		$query = "insert into user (uid, uname, uemail, ucontact, uaddress, upassword, ugender, uage) values ('".$id."', '".$name."', '".$email."', '".$_POST["phone"]."', '".$address."', '".$password."', '".$_POST["gender"]."', '".$_POST["age"]."')";
		$result = mysqli_query($con, $query);
		
		$resultData =  "insert into result (uid, cgpi, backlogs, aggregate, skill) values ('".$id."', '".$cgpi."', '".$backlogs."', '".$aggregate."', '".$skill."')";
		
		$Data = mysqli_query($con, $resultData);
		if($result && $Data)
		{
			echo "<script>alert('Successfully Registered!');window.location.href='register.php';</script>";
		}
	}
}
?>
</body>
</html>