<?php
	include('header.php');
	if(isset($_SESSION["type"]))
	{
?>
<div class="container my-5">
	<h1 class="heading">Manage Question</h1>
	<br />
	<div align="right">
		<button type="button" id="add_button" data-toggle="modal" data-target="#addQuestion" class="btn text-white btn-lg" style="background-color: #804040; border-color: #804040;">Add Question</button>
		<div class="table-responsive" >
			<table id="question_data" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th data-column-id="qid" data-type="numeric">ID</th>
						<th data-column-id="qname">Question</th>
						<th data-column-id="qlevel">Question Level</th>
						<th data-column-id="option">Options (Option1, Option2..)</th>
						<th data-column-id="answer">Answer</th>
						<th data-column-id="qtype">QUestion type</th>
						<th data-column-id="commands" data-formatter="commands" data-sortable="false">Action</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>
</div>

<!-- Add Course Modal -->
<div id="addQuestion" class="modal fade">
	<div class="modal-dialog modal-lg">
		<form method="post" id="question_form">
			<div class="modal-content shadow-lg mb-5 bg-white rounded text-left">
				<div class="modal-header p-0 bg-primary" style="border-radius: 0px">
					<div class="container p-2">
						<label  class="text-white modal-title" style="font-size: 20px;">Add Question</label>
					</div>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6 mt-2">
							<label class="font-weight-bold">Question Type:</label>
						</div>
						<div class="col-md-6 mt-2">
						</div>
						<div class="col-md-3 text-right">
							<input type="radio" name="qtype" value="aptitude" /> Aptitude
						</div>
						<div class="col-md-3">
							<input type="radio" name="qtype" value="course" /> Course
						</div>
						<div class="col-md-6 mt-2">
						</div>
						<div class="col-md-6 mt-2" id="apti" style="display: none;">
							<label class="font-weight-bold">Select Option:</label>
							<select class="form-control" name="typename">
								<option selected disabled >--Select Aptitude Question List--</option>
								<option>G.K.</option>
								<option>English</option>
								<option>Maths</option>
							</select>
						</div>
						<div class="col-md-6 mt-2" id="course" style="display: none;">
							<label class="font-weight-bold">Select Option:</label>
							
								<?php
									$selectCourse = "select * from course";
									$courseResult = mysqli_query($con, $selectCourse);
									$courseCount = mysqli_num_rows($courseResult);
									if($courseCount > 0)
									{
									?>
									<select class="form-control" name="typename">
										<option selected disabled >--Select Course Name--</option>
									<?php
									while($courseRow = mysqli_fetch_array($courseResult))
									{
									?>
										<option><?php echo $courseRow["cname"]; ?></option>
									<?php
									}
									?>
									</select>
									<?php
									}
									else
									{
									?>
										<label class="font-weight-bold">Minimum One Course Should Be Added!</label>
									<?php
									}
								?>
							
						</div>
						<div class="col-md-6 mt-2">
							<label class="font-weight-bold">Question Level</label>
							<select class="form-control" name="level">
								<option>Level 1</option>
								<option>Level 2</option>
							</select>
						</div>
						<div class="col-md-12 mt-2">
							<label class="font-weight-bold">Question</label>
							<textarea type="text" name="edit_question" placeholder="Write Question" class="form-control" Placeholder="Enter Question" required ></textarea>
						</div>
						<div class="col-md-6 mt-2">
							<label class="font-weight-bold">Option 1:</label>
							<input type="text" name="edit_option1" id="edit_option1" class="form-control" Placeholder="Enter Option 1" required />
						</div>
						<div class="col-md-6 mt-2">
							<label class="font-weight-bold">Option 2:</label>
							<input type="text" name="edit_option2" id="edit_option2" class="form-control" Placeholder="Enter Option 2" required />
						</div>
						<div class="col-md-6 mt-2">
							<label class="font-weight-bold">Option 3:</label>
							<input type="text" name="edit_option3" id="edit_option3" class="form-control" Placeholder="Enter Option 3" required />
						</div>
						<div class="col-md-6 mt-2">
							<label class="font-weight-bold">Option 4:</label>
							<input type="text" name="edit_option4" id="edit_option4" class="form-control" Placeholder="Enter Option 4" required />
						</div>
						<div class="col-md-6 mt-2">
							<label class="font-weight-bold">Answer</label>
							<input type="text" name="edit_answer" id="edit_answer" class="form-control" Placeholder="Enter Answer" required />
						</div>
						<div class="col-md-6 mt-2">
							<label class="font-weight-bold">Marks</label>
							<input type="Number" name="edit_marks" id="edit_marks" class="form-control" Placeholder="Enter Marks" required />
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="operation" id="operation" />
					<input type="submit" name="action" id="action" class="btn bg-primary text-white" value="Add" style="display: none;"/>
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
	
		var productTable = $('#question_data').bootgrid({
			ajax: true,
			rowSelect: true,
			post: function()
			{
				return
				{
					id: "b0df282a-0d67-40e5-8558-c9e93b7befed"
				};
			},
			url: "ManageQuestionResponse.php",
			formatters: 
			{
				"commands": function(column, row)
				{
					return "<button type='button' class='btn btn-danger btn-xs delete' data-row-id='"+row.qid+"'>Delete</button>";
				}
			}
		});

		$(document).ready(function(){
			$('#add_button').click(function(){
				$('#question_form')[0].reset();
				$('.modal-title').text("Add Question");
				$('#operation').val("Add");
				$('#action').val("Add");
				 $("#apti").css("display", "none");
				 $("#course").css("display", "none");
				 $("#action").css("display", "none");
			});
		});

		$(document).on('submit', '#question_form', function(event){
			event.preventDefault();
			var operation = $('#operation').val();
			if(operation == "Add")
			{				
				$.ajax({
					url:"ManageQuestionResponse.php",
					method:"POST",
					data:new FormData(this),
					contentType: false,
					cache: false,
					processData:false,
					success:function(data)
					{
					alert(data);
					window.location.href="ManageQuestion.php";
					}
				});
			}
		});

		$(document).on("loaded.rs.jquery.bootgrid", function()
		{
			productTable.find(".delete").on("click", function(event)
			{
				var qid = $(this).data("row-id");
				var operation = "delete";
				$.ajax({
					url:"ManageQuestionResponse.php",
					method:"POST",
					data:{qid:qid, operation:operation},
					dataType:"json",
					success:function(data)
					{
						$('#delete').modal('show');
						$('#delid').val(data.qid);
						$('#delname').text(data.qname);
						$('#delOperation').val("Delete");
					}
				});
			});
		}); 

		$(document).on('submit', '#delete_form', function(event){
			event.preventDefault();
			$.ajax({
				url:"ManageQuestionResponse.php",
				method:"POST",
				data:new FormData(this),
				contentType: false,
				cache: false,
				processData:false,
				success:function(data)
				{
				alert(data);
				window.location.href="ManageQuestion.php";
				}
			});
		});
		
		$(".search-field").attr("placeholder", "Search By Question OR Question Type");
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