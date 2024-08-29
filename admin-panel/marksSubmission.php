<?php
require "../db.php";
session_start();
if(isset($_POST['submit'])) 
{
	$marks=$_POST['marks'];
	$applicant_id=$_POST['applicantid'];
	$query="INSERT INTO `marks_detail`(`applicant_id`, `marks`) VALUES ('$applicant_id','$marks')";
	$insertQuery=mysqli_query($conn,$query);
	if (isset($insertQuery)) 
	{
		header("Location:marksdetail.php");
	}
}
if(isset($_POST['update'])) 
{
	$marks=$_POST['marks'];
	$applicant_id=$_POST['applicantid'];
	$query="UPDATE `marks_detail` SET `marks`='$marks' WHERE `applicant_id`='$applicant_id'";
	$insertQuery=mysqli_query($conn,$query);
	if (isset($insertQuery)) 
	{
		header("Location:marksdetail.php");
	}
}
?>