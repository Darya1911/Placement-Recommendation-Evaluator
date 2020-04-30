<?php
	include('header.php');
	if(isset($_SESSION["type"]))
	{
?>
<div class="container my-5">
	<h1 class="heading">Exam List</h1>
	<br />
	<div align="right">
		<div class="table-responsive" >
			<table id="exam_data" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th data-column-id="did" data-type="numeric" data-visible="false">ID</th>
						<th data-column-id="uid">Student Id</th>
						<th data-column-id="uname">Student Name</th>
						<th data-column-id="cgpi">CGPI</th>
						<th data-column-id="backlogs">Backlogs</th>
						<th data-column-id="aggregate">Aggregate</th>
						<th data-column-id="skill">Skill</th>
						<th data-column-id="aptiscore">Apti Score</th>
						<th data-column-id="coursescore">Course Score</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>
</div>

</div>
<?php
include('footer.php');
?>
<script>
	$(document).ready(function(){
	
		var productTable = $('#exam_data').bootgrid({
			ajax: true,
			rowSelect: true,
			post: function()
			{
				return
				{
					id: "b0df282a-0d67-40e5-8558-c9e93b7befed"
				};
			},
			url: "ExamDetailsResponse.php"
		});
		
		$(".search-field").attr("placeholder", "Search By Student Id Or Name");
	});
</script>

</body>
</html>

<?php
}
else
{
	echo "<script>window.location.href='index.php';</script>";
}
?>