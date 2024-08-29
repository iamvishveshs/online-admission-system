<?php 
require("db.php");

if (isset($_POST['collegeOption'])) {
	$option = $_POST['collegeOption'];
	$arr="<option>Select</option>";
	$firstQuery = "SELECT * FROM `colleges` WHERE `college_id`!='$option' ORDER BY `college_id` ASC";
	$result=mysqli_query($conn,$firstQuery);
	if(mysqli_num_rows($result)>0)
	{
		while($row=mysqli_fetch_assoc($result))
		{
			$arr.='<option value="'.$row['college_id'].'">'.$row['college_name'].'</option>';
		}

		
	}
	echo "$arr";
}
if(isset($_POST['collegeOption1']) && isset($_POST['collegeOption2']))
{
	$option1 = $_POST['collegeOption1'];
	$option2 = $_POST['collegeOption2'];
	$arr="<option>Select</option>";
	$firstQuery = "SELECT * FROM `colleges` ORDER BY `college_id` ASC";
	$result=mysqli_query($conn,$firstQuery);
	if(mysqli_num_rows($result)>0)
	{
		while($row=mysqli_fetch_assoc($result))
		{
			if ($row['college_id']=="$option1" || $row['college_id']=="$option2") {
				continue;
			}
			else
			{
				$arr.='<option value="'.$row['college_id'].'">'.$row['college_name'].'</option>';
			}
			
		}

		
	}
	echo "$arr";
}

/* Getting location lists using jquery AJAX request*/



if (isset($_POST['locationOption'])) {
	$option = $_POST['locationOption'];
	$arr="<option>Select</option>";
	$firstQuery = "SELECT * FROM `district` WHERE `district_id`!='$option' ORDER BY `district_id` ASC";
	$result=mysqli_query($conn,$firstQuery);
	if(mysqli_num_rows($result)>0)
	{
		while($row=mysqli_fetch_assoc($result))
		{
			$arr.='<option value="'.$row['district_id'].'">'.$row['district_name'].'</option>';
		}

		
	}
	echo "$arr";
}
if(isset($_POST['locationOption1']) && isset($_POST['locationOption2']))
{
	$option1 = $_POST['locationOption1'];
	$option2 = $_POST['locationOption2'];
	$arr="<option>Select</option>";
	$firstQuery = "SELECT * FROM `district` ORDER BY `district_id` ASC";
	$result=mysqli_query($conn,$firstQuery);
	if(mysqli_num_rows($result)>0)
	{
		while($row=mysqli_fetch_assoc($result))
		{
			if ($row['district_id']=="$option1" || $row['district_id']=="$option2") {
				continue;
			}
			else
			{
				$arr.='<option value="'.$row['district_id'].'">'.$row['district_name'].'</option>';
			}
			
		}

		
	}
	echo "$arr";
}



/* Getting courses lists using jquery AJAX request*/



if (isset($_POST['programOption'])) {
	$option = $_POST['programOption'];
	$arr="<option>Select</option>";
	$firstQuery = "SELECT * FROM `courses` WHERE `course_id`!='$option' ORDER BY `courses`.`course_name` ASC";
	$result=mysqli_query($conn,$firstQuery);
	if(mysqli_num_rows($result)>0)
	{
		while($row=mysqli_fetch_assoc($result))
		{
			$arr.='<option value="'.$row['course_id'].'">'.$row['course_name'].'</option>';
		}

		
	}
	echo "$arr";
}
if(isset($_POST['programOption1']) && isset($_POST['programOption2']))
{
	$option1 = $_POST['programOption1'];
	$option2 = $_POST['programOption2'];
	$arr="<option>Select</option>";
	$firstQuery = "SELECT * FROM `courses` ORDER BY `courses`.`course_name` ASC";
	$result=mysqli_query($conn,$firstQuery);
	if(mysqli_num_rows($result)>0)
	{
		while($row=mysqli_fetch_assoc($result))
		{
			if ($row['course_id']=="$option1" || $row['course_id']=="$option2") {
				continue;
			}
			else
			{
				$arr.='<option value="'.$row['course_id'].'">'.$row['course_name'].'</option>';
			}
			
		}

		
	}
	echo "$arr";
}




?>