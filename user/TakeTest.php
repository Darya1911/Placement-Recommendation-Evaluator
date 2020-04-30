<?php
	include('header.php');
	if(isset($_SESSION["user_type"]))
	{
?>

<div class="container test my-5">

	<div class="row " id="panel1">
		<div class="col-md-4">
		</div>
		<div class="col-md-4 shadow-lg p-3 mb-5 bg-white rounded py-5">
			<h2 class="heading">Choose A Course</h2>
			<hr/>
			<br/>
			<div class="row">
				<?php
					$selectCourse = "select * from course";
					$courseResult = mysqli_query($con, $selectCourse);
					$courseCount = mysqli_num_rows($courseResult);
					if($courseCount > 0)
					{
					while($courseRow = mysqli_fetch_array($courseResult))
					{
				?>
						<div class="col-md-4 text-left">
							<input type="radio" name="course" value="<?php echo $courseRow["cname"]; ?>" /> <?php echo $courseRow["cname"]; ?>
						</div>
				<?php
					}
					}
					else
					{
				?>
						<label class="font-weight-bold">There are no course in Database!</label>
				<?php
					}
				?>
				<div class="clearfix">
				</div>
				<div class="col-md-12 text-right">
					<br/>
				</div>
				<div class="col-md-12 text-right">
					<button class="btn btn-success nxt_btn" style="display: none;">Next <i class='fas fa-arrow-right'></i> </button>
				</div>
			</div>
		</div>
		<div class="col-md-4">
		</div>
	</div>
	
	<div id="panel2" style="display: none;">
	<form method="post" id="aptitude_form">
	<input type="text" class="selcourse" name="selectcourse" id="selectcourse" style="display: none;"/>
		<h4 class="heading">Online (Aptitude) Test</h4>
		<hr/>

<!-- Aptitude G.K. Test -->
		<h6>G.K.</h6>
		<hr style="width: 10%; float: left; border-top: 4px solid #fff794;  margin-top: 0px;">
		<br/>
		<?php
		$gkselect = "SELECT * FROM `question` where qtype = 'aptitude' and typename = 'G.K.' ORDER by rand() LIMIT 5";
		$i=1;
		$str = "";
		$gkdata = mysqli_query($con, $gkselect);
		while($gkrow = mysqli_fetch_array($gkdata))
		{
			$str .= "<p>Q.".$i.") ".$gkrow["qname"]."</p>";
			$str .= "<div class='row'>
					<input type='text' name='questionid".$i."' value='".$gkrow["qid"]."' style='display: none;'/>
					<div class='col-md-3'>
					<input type='radio' name='option".$i."' value='".$gkrow["option1"]."'/> ".$gkrow["option1"]."
					</div>
					<div class='col-md-3'>
					<input type='radio' name='option".$i."' value='".$gkrow["option2"]."'/> ".$gkrow["option2"]."
					</div>
					<div class='col-md-3'>
					<input type='radio' name='option".$i."' value='".$gkrow["option3"]."'/> ".$gkrow["option3"]."
					</div>
					<div class='col-md-3'>
					<input type='radio' name='option".$i."' value='".$gkrow["option4"]."'/> ".$gkrow["option4"]."
					</div>
					<div class='col-md-12'>
					<br/>
					</div>
					<div class='col-md-12'>
					<button class='btn btn-info form-control work' id='".$i."' type='button'>Workspace</button>
					</div>
					<div class='col-md-12' id='space".$i."' style='display: none;'>
					<div class='text-center px-5 py-4' style='background-color: #17a2b8c9;'>
					<center>
					<textarea  class='form-control' rows='5' style='width: 75%;'></textarea>
					</center>
					</div>
					</div> 
					</div>";
			$str .= "<br/>";
			$i++;
		}
		echo $str;
		?>
		
		<br/>
		
<!-- Aptitude English. Test -->
		<h6>English</h6>
		<hr style="width: 10%; float: left; border-top: 4px solid #fff794;  margin-top: 0px;">
		<br/>
		<?php
		$englishselect = "SELECT * FROM `question` where qtype = 'aptitude' and typename = 'English' ORDER by rand() LIMIT 5";
		$estr = "";
		$englishdata = mysqli_query($con, $englishselect);
		while($englishrow = mysqli_fetch_array($englishdata))
		{
			$estr .= "<p>Q.".$i.") ".$englishrow["qname"]."</p>";
			$estr .= "<div class='row'>
					<input type='text' name='questionid".$i."' value='".$englishrow["qid"]."' style='display: none;'/>
					<div class='col-md-3'>
					<input type='radio' name='option".$i."' value='".$englishrow["option1"]."'/> ".$englishrow["option1"]."
					</div>
					<div class='col-md-3'>
					<input type='radio' name='option".$i."' value='".$englishrow["option2"]."'/> ".$englishrow["option2"]."
					</div>
					<div class='col-md-3'>
					<input type='radio' name='option".$i."' value='".$englishrow["option3"]."'/> ".$englishrow["option3"]."
					</div>
					<div class='col-md-3'>
					<input type='radio' name='option".$i."' value='".$englishrow["option4"]."'/> ".$englishrow["option4"]."
					</div>
					<div class='col-md-12'>
					<br/>
					</div>
					<div class='col-md-12'>
					<button class='btn btn-info form-control work' id='".$i."' type='button'>Workspace</button>
					</div>
					<div class='col-md-12' id='space".$i."' style='display: none;'>
					<div class='text-center px-5 py-4' style='background-color: #17a2b8c9;'>
					<center>
					<textarea  class='form-control' rows='5' style='width: 75%;'></textarea>
					</center>
					</div>
					</div> 
					</div>";
			$estr .= "<br/>";
			$i++;
		}
		echo $estr;
		?>
		
		<br/>
		
<!-- Aptitude Maths Test -->
		<h6>Maths</h6>
		<hr style="width: 10%; float: left; border-top: 4px solid #fff794;  margin-top: 0px;">
		<br/>
		<?php
		$mathselect = "SELECT * FROM `question` where qtype = 'aptitude' and typename = 'Maths' ORDER by rand() LIMIT 5";
		$estr = "";
		$mathdata = mysqli_query($con, $mathselect);
		while($mathrow = mysqli_fetch_array($mathdata))
		{
			$estr .= "<p>Q.".$i.") ".$mathrow["qname"]."</p>";
			$estr .= "<div class='row'>
					<input type='text' name='questionid".$i."' value='".$mathrow["qid"]."' style='display: none;'/>
					<div class='col-md-3'>
					<input type='radio' name='option".$i."' value='".$mathrow["option1"]."'/> ".$mathrow["option1"]."
					</div>
					<div class='col-md-3'>
					<input type='radio' name='option".$i."' value='".$mathrow["option2"]."'/> ".$mathrow["option2"]."
					</div>
					<div class='col-md-3'>
					<input type='radio' name='option".$i."' value='".$mathrow["option3"]."'/> ".$mathrow["option3"]."
					</div>
					<div class='col-md-3'>
					<input type='radio' name='option".$i."' value='".$mathrow["option4"]."'/> ".$mathrow["option4"]."
					</div>
					<div class='col-md-12'>
					<br/>
					</div>
					<div class='col-md-12'>
					<button class='btn btn-info form-control work' id='".$i."' type='button'>Workspace</button>
					</div>
					<div class='col-md-12' id='space".$i."' style='display: none;'>
					<div class='text-center px-5 py-4' style='background-color: #17a2b8c9;'>
					<center>
					<textarea  class='form-control' rows='5' style='width: 75%;'></textarea>
					</center>
					</div>
					</div> 
					</div>";
			$estr .= "<br/>";
			$i++;
		}
		echo $estr;
		?>
		<input type="hidden" name="operation" id="operation" value="apti"/>
		<center><input type="submit" class="btn btn-success" value="submit" /></center>
	</form>
	</div>
	
	<div id="panel3" style="display: none;">
	<h4 class="heading">Online (<label id="online_test"></label>) Test</h4>
	<hr/>
		<form method="post" id="course_form">
			<input type="hidden" id="onlineTestCourse" name="onlineTestCourse"/>
			<div id="append_data"></div>
			<input type="hidden" name="operation" id="operation" value="course"/>
			<center><input type="submit" class="btn btn-success" value="submit" /></center>
		</form>
	</div>
	
</div>

</div>	
<?php
	include('footer.php');
?>

<script>
	$('input:radio[name="course"]').change(function(){
		var qtype = $(this).val();
		$(".selcourse").val(qtype);
		$(".nxt_btn").css("display", "initial");
	});

	$(".nxt_btn").click(function(){
		$("#panel1").css("display","none");
		$("#panel2").css("display","initial");
	});
	
	$(".work").click(function(){
		var id = this.id;
		$("#space"+id).toggle();
	});
	
	$(document).on('submit', '#aptitude_form', function(event){
		var course = $("#selectcourse").val();
		event.preventDefault();
		if(confirm("Do you really want to submit?"))
		{
			$.ajax({
				url:"TakeTestResponse.php",
				method:"POST",
				data:new FormData(this),
				contentType: false,
				cache: false,
				processData:false,
				success:function(data)
				{
					$("#panel2").css("display","none");
					$("#online_test").text(course);
					$("#onlineTestCourse").val(course);
					$("#panel3").css("display","initial");
					$("#append_data").html("");
					$("#append_data").append(data);
				}
			});
		}
		else
		{
			return false;
		}
	});
	
	$(document).on('submit', '#course_form', function(event){
		var aptiscore = document.getElementById("totalAptiScore").value;
		var course = $("#online_test").text();
		event.preventDefault();
		if(confirm("Do you really want to submit?"))
		{
			$.ajax({
				url:"TakeTestResponse.php",
				method:"POST",
				data:new FormData(this),
				contentType: false,
				cache: false,
				processData:false,
				success:function(data)
				{
					alert(data);
					window.location.href = "result.php?apti="+aptiscore+"&course="+course+"";
				}
			});
		}
		else
		{
		return false;
		}
	});
	
	function reply_click(clicked_id)
	{
		$("#coursespace"+clicked_id).toggle();
	}
</script>

</body>
</html>
<?php
}
else
{
	echo "<script>window.location.href='../index.php';</script>";
}
?>