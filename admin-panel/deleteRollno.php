<?php
require "../db.php";
session_start();
if (isset($_SESSION['admin_id'])) {
	$query=mysqli_query($conn,"DELETE FROM `rollnumber` WHERE `applicant_id`!='0'");
	if (isset($query)) {
		header("Location:applicantdetail.php");
	}
	else
	{
		header("Location:rollNumbers.php");
	}
	}

?>