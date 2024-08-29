<?php
require "../db.php";
session_start();
if (isset($_SESSION['admin_id'])) 
{
    $resultDetails = mysqli_query($conn,"SELECT * FROM user WHERE role!='admin'");
    
    while($rowDetails = mysqli_fetch_array($resultDetails))
    {

       $user_id=$rowDetails['id'];
       $checkStatus=mysqli_query($conn,"SELECT * FROM `application_status` WHERE `user_id` ='$user_id' ORDER BY `user_id`");
       $Status = mysqli_fetch_assoc($checkStatus);
       if($Status != '')
       {

          if($Status['status']=="success")
          {

            $lastQuery=mysqli_query($conn,"SELECT * FROM `rollnumber` where applicant_id = (SELECT max(applicant_id) FROM `rollnumber` where applicant_id < '$user_id') ");
            $lastQueryResult=mysqli_fetch_assoc($lastQuery);
            $currentRollNo=intval($lastQueryResult['applicant_rollNumber'])+1;

            $insertQuery=mysqli_query($conn,"INSERT INTO `rollNumber`(applicant_id,applicant_rollNumber) VALUES ('$user_id','$currentRollNo')");
          }	
        }
    }
    header("Location:rollNumbers.php");
}
?>