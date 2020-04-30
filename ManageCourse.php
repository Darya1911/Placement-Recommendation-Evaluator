<?php
	include('header.php');
	if(isset($_SESSION["type"]))
	{
		$id = "";
		$selectid = "SELECT cid FROM `course` ORDER by cid desc LIMIT 1";
		$idresult = mysqli_query($con, $selectid);
		if($idrow = mysqli_fetch_array($idresult))
		{
			$id = $idrow["cid"] + 1;
		}
		else
		{
			$id = 101;
		}
?>
<div class="container my-5">
	<h2 class="heading">Manage Course</h2>
	<br />
	<div align="right">
		<button type="button" id="add_button" data-toggle="modal" data-target="#addCourse" class="btn text-white btn-lg" style="background-color: #804040; border-color: #804040;">Add Course</button>
		<div class="table-responsive" >
			<table id="course_data" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th data-column-id="cid" data-type="numeric">ID</th>
						<th data-column-id="cname">Course Name</th>
						<th data-column-id="commands" data-formatter="commands" data-sortable="false">Action</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>
</div>

<!-- Add Course Modal -->
<div id="addCourse" class="modal fade">
	<div class="modal-dialog modal-md">
		<form method="post" id="course_form">
			<div class="modal-content shadow-lg mb-5 bg-white rounded text-left">
				<div class="modal-header p-0 bg-primary" style="border-radius: 0px">
					<div class="container p-2">
						<label  class="text-white modal-title" style="font-size: 20px;">Add Course Name</label>
					</div>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<label>Id:</label>
							<input type="text" name="edit_cid" id="edit_cid" class="form-control" value="<?php echo $id; ?>" readonly />	
						</div>
						<div class="col-md-12 mt-2">
							<label>Course Name</label>
							<input type="text" name="edit_cname" id="edit_cname" class="form-control" Placeholder="Enter Course Name" required />
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="operation" id="operation" />
					<input type="submit" name="action" id="action" class="btn bg-primary text-white" value="Add" />
					<button type="button" data-dismiss="modal" class="btn bg-danger class text-white">Close</button>
				</div>	
			</div>
		</form>
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
	
		var productTable = $('#course_data').bootgrid({
			ajax: true,
			rowSelect: true,
			post: function()
			{
				return
				{
					id: "b0df282a-0d67-40e5-8558-c9e93b7befed"
				};
			},
			url: "ManageCourseResponse.php",
			formatters: 
			{
				"commands": function(column, row)
				{
					return "<button type='button' class='btn btn-warning btn-xs update' data-row-id='"+row.cid+"'>Edit</button>" + 
				"&nbsp; <button type='button' class='btn btn-danger btn-xs delete' data-row-id='"+row.cid+"'>Delete</button>";
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
			else
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
			productTable.find(".update").on("click", function(event)
			{
				var cid = $(this).data("row-id");
				var operation = "edit_courseModal";
				$.ajax({
					url:"ManageCourseResponse.php",
					method:"POST",
					data:{cid:cid, operation:operation},
					dataType:"json",
					success:function(data)
					{
						$('.modal-title').text("Edit Course Details");
						$('#action').val("Edit");
						$('#operation').val("Edit");
						$('#addCourse').modal('show');
						$('#edit_cid').val(data.cid);
						$('#edit_cname').val(data.cname);
					}
				});
			});
		});

		$(document).on("loaded.rs.jquery.bootgrid", function()
		{
			productTable.find(".delete").on("click", function(event)
			{
				var cid = $(this).data("row-id");
				var operation = "delete";
				$.ajax({
					url:"ManageCourseResponse.php",
					method:"POST",
					data:{cid:cid, operation:operation},
					dataType:"json",
					success:function(data)
					{
						$('#delete').modal('show');
						$('#delid').val(data.cid);
						$('#delname').text(data.cname);
						$('#delOperation').val("Delete");
					}
				});
			});
		}); 

		$(document).on('submit', '#delete_form', function(event){
			event.preventDefault();
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
		});
		
		$(".search-field").attr("placeholder", "Search By Course Name");
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