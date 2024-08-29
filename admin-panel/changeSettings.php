<?php
session_start();
require "../db.php";
  if(isset($_POST['btnValue']))
    {
        // Getting the value of button
        // in $btnValue variable
        $btnValue = $_POST['btnValue'];
       
         $query=mysqli_query($conn,"SELECT * FROM `setting`");
         $result=mysqli_fetch_assoc($query);
         if ($result['item']=="application_Submission_Close" && $result['status']=="true") {
         	$updateQuery=mysqli_query($conn,"UPDATE `setting` SET `status`='false' WHERE `id`='1'");
         	echo "false";
         }
         else
         {
         	$updateQuery=mysqli_query($conn,"UPDATE `setting` SET `status`='true' WHERE `id`='1'");
         	echo "true";
         }
    }

    if(isset($_POST['ReleaseAdmitCardValue']))
    {
        // Getting the value of button
        // in $btnValue variable
        $ReleaseAdmitCardValue = $_POST['ReleaseAdmitCardValue'];
       
         $query=mysqli_query($conn,"SELECT * FROM `setting` WHERE id='2'");
         $result=mysqli_fetch_assoc($query);
         if ($result['item']=="Release_Admit_Card" && $result['status']=="true") {
          $updateQuery=mysqli_query($conn,"UPDATE `setting` SET `status`='false' WHERE `id`='2'");
          echo "false";
         }
         else
         {
          $updateQuery=mysqli_query($conn,"UPDATE `setting` SET `status`='true' WHERE `id`='2'");
          echo "true";
         }
    }
    if(isset($_POST['ReleaseResultValue']))
    {
        // Getting the value of button
        // in $btnValue variable
        $ReleaseAdmitCardValue = $_POST['ReleaseResultValue'];
       
         $query=mysqli_query($conn,"SELECT * FROM `setting` WHERE id='3'");
         $result=mysqli_fetch_assoc($query);
         if ($result['item']=="ReleaseResult" && $result['status']=="true") {
          $updateQuery=mysqli_query($conn,"UPDATE `setting` SET `status`='false' WHERE `id`='3'");
          echo "false";
         }
         else
         {
          $updateQuery=mysqli_query($conn,"UPDATE `setting` SET `status`='true' WHERE `id`='3'");
          echo "true";
         }
    }
?>