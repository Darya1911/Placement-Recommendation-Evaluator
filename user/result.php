<?php
use Phpml\Classification\NaiveBayes;
require '../vendor/autoload.php';
if(isset($_GET["course"]))
{
	include('header.php');
	$select = "select * from result where uid='".$_SESSION["id"]."'";
	$result = mysqli_query($con, $select);
	$row = mysqli_fetch_array($result);
	
	$cgpi = $row["cgpi"];
	$backlogs = $row["backlogs"];
	$aggregate = $row["aggregate"];
	$skill = $row["skill"];
	$coursescore = $row["coursescore"];
	$splitData = explode(",", $row["aptiscore"]);

	$course = $_GET["course"];
	$apti = $_GET["apti"];

	$select1 = "select * from dataset";
	$result1 = mysqli_query($con, $select1);

	while($row1 = mysqli_fetch_array($result1))
	{
		$samples[] = array($row1["cgpi"], $row1["backlogs"], $row1["aggregate"], $row1["skill"], $row1["aptiscore"], $row1["cgpi"],
		);
		$labels[] = $row1["coursename"];
	}
?>

	<div class="container my-4">
		<div class="row">
			<div class="col-md-2">
			</div>
			<div class="col-md-8">
				<form method="post">
					<h2 class="heading">Your Scores</h2>
					<hr/>
					<br/>
					<table class="text-center table table-bordered">
						<thead>
							<tr>
								<td colspan="3">
									<h4>Aptitude Score</h4>
								</td>
								<td colspan="3">
									<h4>Course Score</h4>
								</td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<h5>G.K</h5>
								</td>
								<td>
									<h5>Maths</h5>
								</td>
								<td>
									<h5>English</h5>
								</td>
								<td colspan="3">
									<h5><?php echo $course; ?></h5>
								</td>
							</tr>
							<tr>
								<td>
									<p><?php echo $splitData[0]; ?></p>
								</td>
								<td>
									<p><?php echo $splitData[1]; ?></p>
								</td>
								<td>
									<p><?php echo $splitData[2]; ?></p>
								</td>
								<td colspan="3">
									<p><?php echo $coursescore; ?></p>
								</td>
							</tr>
							<?php
								$classifier = new NaiveBayes();
								$classifier->train($samples, $labels);
							?>
							<tr>
								<td colspan="3">
									<h5 class="text-right"> Total Score : </h5>
								</td>
								<td colspan="3">
									<h5><?php $total = $apti+$coursescore;
									echo $total . "/30";
									?></h5>
								</td>
							</tr>
							<tr>
								<td colspan="3">
									<h5 class="text-right"> Best Predicted Field : </h5>
								</td>
								<td colspan="3">
									<h5><?php print_r($classifier->predict([$cgpi, $backlogs, $aggregate, $skill, $apti, $coursescore])); ?></h5>
								</td>
							</tr>
						</tbody>
					</table>
					<div class="text-right">
						<input type="submit" class="btn btn-primary text-right done" value="Done" name="submit"/>
					</div>
				</form>
			</div>
			<div class="col-md-2">
			</div>
		</div>
	</div>
	</div>	
	<?php
	if(isset($_POST["submit"]))
	{
	$update = "update result set aptiscore = '".$apti."' where uid='".$_SESSION["id"]."'";
	$upresult = mysqli_query($con, $update);
	echo "<script>window.location.href='TakeTest.php'</script>";
	}
	include('footer.php');
	?>

	</body>
	</html>

<?php
}
else
{
echo "<script>window.location.href='TakeTest.php'</script>";
}
?>
