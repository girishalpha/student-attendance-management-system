<?php

//teacher_action.php

include('database_connection.php');

session_start();

if(isset($_POST["action"]))
{
	if($_POST["action"] == "fetch")
	{
		$query = "
		SELECT * FROM tbl_staffwork 
		INNER JOIN tbl_grade 
		ON tbl_grade.grade_id = tbl_staffwork.teacher_grade_id 
		";
		if(isset($_POST["search"]["value"]))
		{
			$query .= '
			WHERE tbl_teacher.teacher_name LIKE "%'.$_POST["search"]["value"].'%" 
			OR tbl_grade.grade_name LIKE "%'.$_POST["search"]["value"].'%" 
			';
		}
		if(isset($_POST["order"]))
		{
			$query .= '
			ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].'
			';
		}
		else
		{
			$query .= '
			ORDER BY tbl_staffwork.staffwork_id DESC 
			';
		}
		if($_POST["length"] != -1)
		{
			$query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}

		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		$data = array();
		$filtered_rows = $statement->rowCount();
		foreach($result as $row)
		{
			$sub_array = array();
			$sub_array[] = $row["date"];
			$sub_array[] = $row["staff_name"];
			$sub_array[] = $row["grade_id"];
			$sub_array[] = $row["suject_id"];
			$sub_array[] = $row["subject_hour"];
			$sub_array[] = $row["topic"];
			$sub_array[] = $row["remark"];
			$sub_array[] = '<button type="button" name="view_staffwork" class="btn btn-info btn-sm view_staffwork" id="'.$row["staffwork_id"].'">View</button>';
			$sub_array[] = '<button type="button" name="edit_staffwork" class="btn btn-primary btn-sm edit_staffwork" id="'.$row["staffwork_id"].'">Edit</button>';
			$sub_array[] = '<button type="button" name="delete_staffwork0" class="btn btn-danger btn-sm delete_staffwork" id="'.$row["staffwork_id"].'">Delete</button>';
			$data[] = $sub_array;
		}
		$output = array(
			"draw"				=>	intval($_POST["draw"]),
			"recordsTotal"		=> 	$filtered_rows,
			"recordsFiltered"	=>	get_total_records($connect, 'tbl_staffwork'),
			"data"				=>	$data
		);
		echo json_encode($output);
	}

	if($_POST["action"] == 'Add' || $_POST["action"] == "Edit")
	{
		$date = '';
		$staff_name = '';
		$grade_id = '';
		$subject_id = '';
		$subject_hour = '';
		$topic = '';
		$remark = '';
		$error_date = '';
		$error_staff_name = '';
		$error_grade_id = '';
		$error_subject_id = '';
		$error_subject_hour = '';
		$error_topic = '';
		$error_remark = '';
		$error = 0;

		if(empty($_POST["date"]))
		{
			$error_date = 'Date is required';
			$error++;
		}
		else
		{
			$staff_name = $_POST["staff_name"];
		}
		if(empty($_POST["grade_id"]))
		{
			$error_grade_id = 'Grade is required';
			$error++;
		}
		else
		{
			$subject_id = $_POST["subject_id"];
		}
			if(empty($_POST["subject_hour"]))
			{
				$error_subject_hour = "subject hour is required";
				$error++;
			}
			else
			{
				$subject_hour = $_POST["subject_hour"];
			}
		}
		if(empty($_POST["teacher_topic"]))
		{
			$error_topic = "Topic is required";
			$error++;
		}
		else
		{
			$topic = $_POST["topic"];
		}
		if(empty($_POST["remark"]))
		{
			$error_remark = 'Remark Field is required';
			$error++;
		}
		else
		{
			$teacher_reamark = $_POST["remark"];
		}
	
		if($error > 0)
		{
			$output = array(
				'error'							=>	true,
				'error_date'			    =>	$error_date,
				'error_staff_name'			=>	$error_staff_name,
				'error_grade_id'			=>	$error_grade_id,
				'error_subject_id'	    	=>	$error_subject_id,
				'error_subject_hour'		=>	$error_subject_hour,
				'error_topic'	            =>	$error_topic,
				'error_remark'				=>	$error_remark
			);
		}
		else
		{
			if($_POST["action"] == 'Add')
			{
				$data = array(
					':date'		           	=>	$data,
					':staff_name'		    =>	$staff_name,
					':grade_id'	           	=>	$grade_id,
					':subject_id'	        =>	$subject_id,
					':subject_hour'			=>	$subject_hour,
					':topic'		        =>	$topic,
					':remark'		        =>	$remark
				);
				$query = "
				INSERT INTO tbl_staffwork 
				(date, staff_name, grade_id, subject_id, subject_hour, topic, remark) 
				SELECT * FROM (SELECT :date, :staff_name, :grade_id, :subject_id, :subject_hour, :topic, :remark) as temp 

			if($_POST["action"] == "Edit")
			{
				$data = array(
					':date'		           	=>	$data,
					':staff_name'		    =>	$staff_name,
					':grade_id'	           	=>	$grade_id,
					':subject_id'	        =>	$subject_id,
					':subject_hour'			=>	$subject_hour,
					':topic'		        =>	$topic,
					':remark'		        =>	$remark
					':staffwork_id'		=>	$_POST["staffwork_id"]
				);
				$query = "
				UPDATE tbl_staffwork 
				SET date= :date, 
				staff_name = :staff_name,  
				grade_id = :grade_id, 
				subject_id = :subject_id, 
				subject_hour = :subject_hour, 
				topic = :topic
				WHERE staffwork_id = :staffwork_id
				";
				$statement = $connect->prepare($query);
				if($statement->execute($data))
				{
					$output = array(
						'success'		=>	'Data Edited Successfully',
					);
				}
			}
		}
		echo json_encode($output);
	}



	if($_POST["action"] == "single_fetch")
	{
		$query = "
		SELECT * FROM tbl_staffwork 
		INNER JOIN tbl_grade 
		ON tbl_grade.grade_id = tbl_teacher.teacher_grade_id
		ON tbl_subject.subject_id = tbl_staffwork.subject_id 
		WHERE tbl_staffwork.staffwork_id = '".$_POST["staffwork_id"]."'";
		$statement = $connect->prepare($query);
		if($statement->execute())
		{
			$result = $statement->fetchAll();
			$output = '
			<div class="row">
			';
			foreach($result as $row)
			{
				$output .= '
				<div class="col-md-9">
					<table class="table">
						<tr>
							<th>Date</th>
							<td>'.$row["Date"].'</td>
						</tr>
						<tr>
							<th>Name</th
							<td>'.$row["staff_name"].'</td>
						</tr>
						<tr>
							<th>Grade</th>
							<td>'.$row["grade_id"].'</td>
						</tr>
						<tr>
							<th>Subject</th>
							<td>'.$row["subject_id"].'</td>
						</tr>
						<tr>
							<th>Subject Hour</th>
							<td>'.$row["subject_hour"].'</td>
						</tr>
						<tr>
							<th>Topic</th>
							<td>'.$row["topic"].'</td>
						</tr>
						<tr>
							<th>Remark</th>
							<td>'.$row["remark"].'</td>
						</tr>
					</table>
				</div>
				';
			}
			$output .= '</div>';
			echo $output;
		}
	}

	if($_POST["action"] == "edit_fetch")
	{
		$query = "
		SELECT * FROM tbl_staffwork WHERE staffwork_id = '".$_POST["staffwork_id"]."'
		";
		$statement = $connect->prepare($query);
		if($statement->execute())
		{
			$result = $statement->fetchAll();
			foreach($result as $row)
			{
				$output["date"] = $row["date"];
				$output["staff_name"] = $row["staff_name"];
				$output["grade_id"] = $row["grade_id"];
				$output["subject_id"] = $row["subject_id"];
				$output["subject_hour"] = $row["subject_hour"];
				$output["topic"] = $row["topic"];
				$output["remark"] = $row["remark"];
			}
			echo json_encode($output);
		}
	}

	if($_POST["action"] == "delete")
	{
		$query = "
		DELETE FROM tbl_teacher 
		WHERE staffwork_id = '".$_POST["staffwork_id"]."'
		";
		$statement = $connect->prepare($query);
		if($statement->execute())
		{
			echo 'Data Deleted Successfully';
		}
	}
	
}

?>