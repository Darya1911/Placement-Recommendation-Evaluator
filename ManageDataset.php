<?php
	include('header.php');
	if(isset($_SESSION["type"]))
	{
?>
<div class="container my-5">
	<h1 class="heading">Manage Data-sets</h1>
	<br />
	<div align="right">
		<button type="button" id="add_button" data-toggle="modal" data-target="#addDatasets" class="btn text-white btn-lg" style="background-color: #804040; border-color: #804040;">Add Data-sets</button>
		<div class="table-responsive" >
			<table id="data_set" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th data-column-id="did" data-type="numeric">ID</th>
						<th data-column-id="cgpi">CGPI</th>
						<th data-column-id="backlogs">Backlogs</th>
						<th data-column-id="aggregate">Aggregate</th>
						<th data-column-id="skill">Skill</th>
						<th data-column-id="aptiscore">Apti Score</th>
						<th data-column-id="coursescore">Course Score</th>
						<th data-column-id="coursename">Course Name</th>
						<th data-column-id="commands" data-formatter="commands" data-sortable="false">Action</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>
</div>

<!-- Add Course Modal -->
<div id="addDatasets" class="modal fade">
	<div class="modal-dialog modal-lg">
		<form method="post" id="question_form">
			<div class="modal-content shadow-lg mb-5 bg-white rounded text-left">
				<div class="modal-header p-0 bg-primary" style="border-radius: 0px">
					<div class="container p-2">
						<label  class="text-white modal-title" style="font-size: 20px;">Add Data-sets</label>
					</div>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6 mt-2">
							<label class="font-weight-bold">CGPI</label>
							<input type="text" name="edit_cgpi" id="edit_cgpi" class="form-control" Placeholder="Enter CGPI" required />
						</div>
						<div class="col-md-6 mt-2">
							<label class="font-weight-bold">Backlogs</label>
							<input type="number" name="edit_backlogs" id="edit_backlogs" class="form-control" Placeholder="Enter Number Of Backlogs" required />
						</div>
						<div class="col-md-6 mt-2">
							<label class="font-weight-bold">Aggregate % (10 n 12):</label>
							<input type="number" name="edit_aggregate" id="edit_aggregate" class="form-control" Placeholder="Enter Aggregate % (10 n 12)" required />
						</div>
						<div class="col-md-6 mt-2">
							<label class="font-weight-bold">Aptitude Score:</label>
							<input type="number" name="edit_aptitude" id="edit_aptitude" class="form-control" Placeholder="Enter Aptitude Score" required />
						</div>
						<div class="col-md-6 mt-2">
							<label class="font-weight-bold">Course Score:</label>
							<input type="number" name="edit_course" id="edit_course" class="form-control" Placeholder="Enter Course Score" required />
						</div>
						<div class="col-md-6 mt-2">
							<label class="font-weight-bold">Suggested Course Name:</label>
							<input type="text" name="edit_name" id="edit_name" class="form-control" Placeholder="Enter Course Name" required />
						</div>
						<div class="col-md-12 mt-2">
							<label class="font-weight-bold">Skill</label>
							<textarea type="text" name="edit_skill" placeholder="Address" class="form-control" Placeholder="Enter Skills" required ></textarea>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="operation" id="operation" />
					<input type="submit" name="action" id="action" class="btn bg-primary text-white" value="Add"/>
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
					<h6>Are you sure you want to delete Dataset Details?</h6>
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
	
		var productTable = $('#data_set').bootgrid({
			ajax: true,
			rowSelect: true,
			post: function()
			{
				return
				{
					id: "b0df282a-0d67-40e5-8558-c9e93b7befed"
				};
			},
			url: "ManageDatasetResponse.php",
			formatters: 
			{
				"commands": function(column, row)
				{
					return "<button type='button' class='btn btn-danger btn-xs delete' data-row-id='"+row.did+"'>Delete</button>";
				}
			}
		});

		$(document).ready(function(){
			$('#add_button').click(function(){
				$('#question_form')[0].reset();
				$('.modal-title').text("Add Data-sets");
				$('#operation').val("Add");
				$('#action').val("Add");
			});
		});

		$(document).on('submit', '#question_form', function(event){
			event.preventDefault();
			var operation = $('#operation').val();
			if(operation == "Add")
			{				
				$.ajax({
					url:"ManageDatasetResponse.php",
					method:"POST",
					data:new FormData(this),
					contentType: false,
					cache: false,
					processData:false,
					success:function(data)
					{
					alert(data);
					window.location.href="ManageDataset.php";
					}
				});
			}
		});

		$(document).on("loaded.rs.jquery.bootgrid", function()
		{
			productTable.find(".delete").on("click", function(event)
			{
				var did = $(this).data("row-id");
				var operation = "delete";
				$.ajax({
					url:"ManageDatasetResponse.php",
					method:"POST",
					data:{did:did, operation:operation},
					dataType:"json",
					success:function(data)
					{
						$('#delete').modal('show');
						$('#delid').val(data.did);
						$('#delOperation').val("Delete");
					}
				});
			});
		}); 

		$(document).on('submit', '#delete_form', function(event){
			event.preventDefault();
			$.ajax({
				url:"ManageDatasetResponse.php",
				method:"POST",
				data:new FormData(this),
				contentType: false,
				cache: false,
				processData:false,
				success:function(data)
				{
				alert(data);
				window.location.href="ManageDataset.php";
				}
			});
		});
		
		$(".search-field").attr("placeholder", "Search By Course Name");
	});
	
	$('input:radio[name="qtype"]').change(function(){
	var qtype = $(this).val();
	$("#action").css("display", "none");
	if(qtype == "aptitude")
	{
	 $("#apti").css("display", "initial");
	 $("#course").css("display", "none");
	}
	else
	{
	$("#course").css("display", "initial");
	$("#apti").css("display", "none");
	}
	});
	
	$('select[name="typename"]').change(function(){
	$("#action").css("display", "initial");
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