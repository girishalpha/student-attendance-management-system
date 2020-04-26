<?php

include('header.php');

?>

<div class="container" style="margin-top:30px">
  <div class="card">
  	<div class="card-header">
      <div class="row">
        <div class="col-md-9">Staff Work Diary</div>
        <div class="col-md-3" align="right">
          <button type="button" id="add_button" class="btn btn-info btn-sm">Add</button>
        </div>
      </div>
    </div>
  	<div class="card-body">
  		<div class="table-responsive">
        <span id="message_operation"></span>
  			<table class="table table-striped table-bordered" id="staffwork_table">
  				<thead>
  					<tr>
  						<th>Date</th>
  						<th>Staff Name</th>
  						<th>Grade</th>
              <th>Subject</th>
              <th>Hour</th>
              <th>Topic Covered</th>
              <th>Remark</th>
  						<th>View</th>
  						<th>Edit</th>
  						<th>Delete</th>
  					</tr>
  				</thead>
  				<tbody>

  				</tbody>
  			</table>
  		</div>
  	</div>
  </div>
</div>
</body>
</html>

<script type="text/javascript" src="../js/bootstrap-datepicker.js"></script>
<link rel="stylesheet" href="../css/datepicker.css" />

<style>
    .datepicker {
      z-index: 1600 !important; /* has to be larger than 1050 */
    }
</style>

<div class="modal" id="formModal">
  <div class="modal-dialog">
    <form method="post" id="staffwork_form" enctype="multipart/form-data">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title" id="modal_title"></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="form-group">
            <div class="row">
              <label class="col-md-4 text-right">Date<span class="text-danger">*</span></label>
              <div class="col-md-8">
                <input type="text" name="date" id="date" class="form-control" />
                <span id="error_date" class="text-danger"></span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <label class="col-md-4 text-right">Grade <span class="text-danger">*</span></label>
              <div class="col-md-8">
                <select name="teacher_name" id="teacher_id" class="form-control">
                  <option value="">Select Teacher</option>
                  <?php
                  echo load_teacher_list($connect);
                  ?>
                </select>
                <span id="error_teacher_id" class="text-danger"></span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <label class="col-md-4 text-right">Grade <span class="text-danger">*</span></label>
              <div class="col-md-8">
                <select name="grade_id" id="grade_id" class="form-control">
                  <option value="">Select Grade</option>
                  <?php
                  echo load_grade_list($connect);
                  ?>
                </select>
                <span id="error_grade_id" class="text-danger"></span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <label class="col-md-4 text-right">Subject <span class="text-danger">*</span></label>
              <div class="col-md-8">
                <select name="subject_id" id="subject_id" class="form-control">
                  <option value="">Select Subject Name</option>
                  <?php
                  echo load_subject_name($connect);
                  ?>
                </select>
                <span id="error_subject_id" class="text-danger"></span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <label class="col-md-4 text-right">Hour<span class="text-danger">*</span></label>
              <div class="col-md-8">
                <input type="text" name="subject_hour" id="subject_hour" class="form-control" />
                <span id="error_subject_hour" class="text-danger"></span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <label class="col-md-4 text-right">Topic Covered<span class="text-danger">*</span></label>
              <div class="col-md-8">
                <input type="text" name="topic" id="topic" class="form-control" />
                <span id="error_topic" class="text-danger"></span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <label class="col-md-4 text-right">Remark<span class="text-danger">*</span></label>
              <div class="col-md-8">
                <input type="text" name="remark" id="remark" class="form-control" />
                <span id="error_remark" class="text-danger"></span>
              </div>
            </div>
          </div>


        <!-- Modal footer -->
        <div class="modal-footer">
          <input type="hidden" name="action" id="action" value="Add" />
          <input type="submit" name="button_action" id="button_action" class="btn btn-success btn-sm" value="Add" />
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
        </div>

      </div>
    </form>
  </div>
</div>

<div class="modal" id="viewModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Staff Work Diary</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" id="staffwork_details">

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<div class="modal" id="deleteModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Delete Confirmation</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <h3 align="center">Are you sure you want to remove this?</h3>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      	<button type="button" name="ok_button" id="ok_button" class="btn btn-primary btn-sm">OK</button>
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>


<script>
$(document).ready(function(){
	var dataTable = $('#staffwork_table').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"staffwork_action.php",
			type:"POST",
			data:{action:'fetch'}
		},
		"columnDefs":[
			{
				"targets":[0, 4, 5, 6],
				"orderable":false,
			},
		],
	});

  $('#date').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true,
        container: '#formModal modal-body'
    });

  function clear_field()
  {
    $('#staffwork_form')[0].reset();
    $('#error_date').text('');
    $('#error_grade_id').text('');
    $('#error_subject_id').text('');
    $('#error_subject_hour').text('');
    $('error_topic').text('');
    $('#error_remark').text('');
  }

  $('#add_button').click(function(){
    $('#modal_title').text("Add Staff Work Details");
    $('#button_action').val('Add');
    $('#action').val('Add');
    $('#formModal').modal('show');
    clear_field();
  });

  $('#teacher_form').on('submit', function(event){
    event.preventDefault();
    $.ajax({
      url:"staffwork_action.php",
      method:"POST",
      data:new FormData(this),
      dataType:"json",
      contentType:false,
      processData:false,
      beforeSend:function()
      {        
        $('#button_action').val('Validate...');
        $('#button_action').attr('disabled', 'disabled');
      },
      success:function(data){
        $('#button_action').attr('disabled', false);
        $('#button_action').val($('#action').val());
        if(data.success)
        {
          $('#message_operation').html('<div class="alert alert-success">'+data.success+'</div>');
          clear_field();
          $('#formModal').modal('hide');
          dataTable.ajax.reload();
        }
        if(data.error)
        { 
          if(data.error_date != '')
          {
            $('#error_date').text(data.error_date);
          }
          else
          {
            $('#error_date').text('');
          }
          if(data.error_grade_id != '')
          {
            $('#error_grade_id').text(data.error_grade_id);
          }
          else
          {
            $('#error_geade_id').text('');
          }
          if(data.error_subject_id != '')
          {
            $('#error_subject_id').text(data.error_subject_id);
          }
          else
          {
            $('error_subject_id').text('');
          }
          if(data.error_subject_hour != '')
          {
            $('#error_subject_hour').text(data.error_subject_hour);
          }
          else
          {
            $('#error_subject_hour').text('');
          }
          if(data.error_teacher_grade_id != '')
          {
            $('#error_teacher_grade_id').text(data.error_teacher_grade_id);
          }
          else
          {
            $('#error_teacher_grade_id').text('');
          }
          if(data.error_topic != '')
          {
            $('#error_topic').text(data.error_topic);
          }
          else
          {
            $('#error_topic').text('');
          }
          if(data.error_remark != '')
          {
            $('#error_remark').text(data.error_remark);
          }
          else
          {
            $('#error_remark').text('');
          }
        }
      }
    });
  });

  var staffwork_id = '';

  $(document).on('click', '.view_teacher', function(){
    staffwork_id = $(this).attr('id');
    $.ajax({
      url:"staffwork_action.php",
      method:"POST",
      data:{action:'single_fetch', staffwork_id:staffwork_id},
      success:function(data)
      {
        $('#viewModal').modal('show');
        $('#teacher_details').html(data);
      }
    });
  });

  $(document).on('click', '.edit_teacher', function(){
  	staffwork_id = $(this).attr('id');
  	clear_field();
  	$.ajax({
  		url:"staffwork_action.php",
  		method:"POST",
  		data:{action:'edit_fetch', staffwork_id:staffwork_id},
  		dataType:"json",
  		success:function(data)
  		{
  			$('#date').val(data.date);
  			$('#grade_id').val(data.grade_id);
  			$('#subject_id').val(data.subject_id);
  			$('#subject_hour').val(data.teacher_qualification);
  			$('#teacher_grade_id').val(data.teacher_grade_id);
  			$('#topic').val(data.topic);
        $('#remark').val(data.reamark);
  			$('#modal_title').text('Edit Teacher');
  			$('#button_action').val('Edit');
  			$('#action').val('Edit');
  			$('#formModal').modal('show');
  		}
  	});
  });

  $(document).on('click', '.delete_teacher', function(){
  	staffwork_id = $(this).attr('id');
  	$('#deleteModal').modal('show');
  });

  $('#ok_button').click(function(){
  	$.ajax({
  		url:"staffwork_action.php",
  		method:"POST",
  		data:{staffwork_id:staffwork_id, action:'delete'},
  		success:function(data)
  		{
  			$('#message_operation').html('<div class="alert alert-success">'+data+'</div>');
  			$('#deleteModal').modal('hide');
  			dataTable.ajax.reload();
  		}
  	})
  });

});
</script>