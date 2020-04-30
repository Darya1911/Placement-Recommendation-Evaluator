<?php
	include('header.php');
	if(isset($_SESSION["type"]))
	{
?>
<div class="container my-5">
	<h1 class="heading">Students List</h1>
	<br />
	<div align="right">
		<div class="table-responsive" >
			<table id="user_data" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th data-column-id="uid" data-type="numeric" data-visible="false">ID</th>
						<th data-column-id="uname">Student Name</th>
						<th data-column-id="uemail">Email</th>
						<th data-column-id="ucontact">Contact</th>
						<th data-column-id="uaddress">Address</th>
						<th data-column-id="cgpi">CGPI</th>
						<th data-column-id="backlogs">Backlogs</th>
						<th data-column-id="aggregate">Aggregate % (10 n 12)</th>
						<th data-column-id="skill">Skills</th>
						<th data-column-id="commands" data-formatter="commands" data-sortable="false">Action</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>
</div>

<!-- The Confirmation Modal -->
<div id="delete" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="delete_form">
			<div class="modal-content shadow-lg mb-5 bg-white rounded text-left">
				<div class="modal-header p-0 bg-danger" style="border-radius: 0px">
					<div class="container p-2">
						<label  class="text-white" style="font-size: 20px;"><i class="fa fa-warning" style="color: #ffffa5; "></i> Confirmation</label>
					</div>
				</div>
				<div class="modal-body">
					<input type="text" name="delid" id="delid" class="form-control invisible"/>
					<h6>Are you sure you want to delete <mark><label name="delname" class="font-weight-bold" id="delname"></label></mark>  Course Details?</h6>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="delOperation" id="delOperation" />
					<input type="submit" name="delAction" id="delAction" class="btn bg-danger text-white" value="Yes" />
					<button type="button" data-dismiss="modal" class="btn bg-warning class text-white">No</button>
				</div>
			</div>
		</form>
	</div>
</div>
</div>
<?php
include('footer.php');
?>
<script>
	$(document).ready(function(){
	
		var productTable = $('#user_data').bootgrid({
			ajax: true,
			rowSelect: true,
			post: function()
			{
				return
				{
					id: "b0df282a-0d67-40e5-8558-c9e93b7befed"
				};
			},
			url: "ManageStudentResponse.php",
			formatters: 
			{
				"commands": function(column, row)
				{
				return "&nbsp; <button type='button' class='btn btn-danger btn-xs delete' data-row-id='"+row.uid+"'>Delete</button>";
				}
			}
		});

		$(document).ready(function(){
			$('#add_button').click(function(){
				$('#course_form')[0].reset();
				$('.modal-title').text("Add Course");
				$('#operation').val("Add");
				$('#action').val("Add");
			});
		});

		$(document).on('submit', '#course_form', function(event){
			event.preventDefault();
			var operation = $('#operation').val();
			if(operation == "Add")
			{				
				$.ajax({
					url:"ManageCourseResponse.php",
					method:"POST",
					data:new FormData(this),
					contentType: false,
					cache: false,
					processData:false,
					success:function(data)
					{
					alert(data);
					window.location.href="ManageCourse.php";
					}
				});
			}
		});

		

		$(document).on("loaded.rs.jquery.bootgrid", function()
		{
			productTable.find(".delete").on("click", function(event)
			{
				var uid = $(this).data("row-id");
				var operation = "delete";
				$.ajax({
					url:"ManageStudentResponse.php",
					method:"POST",
					data:{uid:uid, operation:operation},
					dataType:"json",
					success:function(data)
					{
						$('#delete').modal('show');
						$('#delid').val(data.uid);
						$('#delname').text(data.uname);
						$('#delOperation').val("Delete");
					}
				});
			});
		}); 

		$(document).on('submit', '#delete_form', function(event){
			event.preventDefault();
			$.ajax({
				url:"ManageStudentResponse.php",
				method:"POST",
				data:new FormData(this),
				contentType: false,
				cache: false,
				processData:false,
				success:function(data)
				{
				alert(data);
				window.location.href="ManageStudent.php";
				}
			});
		});
		
		$(".search-field").attr("placeholder", "Search By Student Name OR Skills");
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