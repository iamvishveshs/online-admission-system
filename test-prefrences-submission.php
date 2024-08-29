<?php
session_start();
require("db.php");
if(isset($_SESSION['id']) && isset($_POST['submit']))
{
    print_r($_FILES);
    $error=0;
    $success_counter=0;
    function testPreferences() 
    {
        require("db.php");
        $id=mysqli_real_escape_string($conn,$_POST['id']);
        $firstLocation=mysqli_real_escape_string($conn,$_POST['firstLocation']);
        $secondLocation=mysqli_real_escape_string($conn,$_POST['secondLocation']);
        $thirdLocation=mysqli_real_escape_string($conn,$_POST['thirdLocation']);
        
        $insert_query="INSERT INTO `test_prefrences`(`applicant_id`, `first_location`, `second_location`, `third_location`) VALUES ('$id','$firstLocation','$secondLocation','$thirdLocation')";
        $result=mysqli_query($conn,$insert_query);
        if(isset($result))
        {

            
            global $success_counter;
            $success_counter++;
        }
        else
        {
            global $error;
            $error++;
        }
    }

    function collegePreferences() 
    {
        require("db.php");
        $id=mysqli_real_escape_string($conn,$_POST['id']);
        $first=mysqli_real_escape_string($conn,$_POST['first']);
        $second=mysqli_real_escape_string($conn,$_POST['second']);
        $third=mysqli_real_escape_string($conn,$_POST['third']);
        
        $insert_query="INSERT INTO `college_preferences`(`applicant_id`, `first_preference`, `second_preference`, `third_preference`) VALUES ('$id','$first','$second','$third')";
        $result=mysqli_query($conn,$insert_query);
        if(isset($result))
        {
            
            global $success_counter;
            $success_counter++;
        }
        else
        {
            global $error;
            $error++;
        }
    }
    function programPreferences() 
    {
        require("db.php");
        $id=mysqli_real_escape_string($conn,$_POST['id']);
        $first=mysqli_real_escape_string($conn,$_POST['firstProgram']);
        $second=mysqli_real_escape_string($conn,$_POST['secondProgram']);
        $third=mysqli_real_escape_string($conn,$_POST['thirdProgram']);
        
        $insert_query="INSERT INTO `program_preferences`(`applicant_id`, `first_program`, `second_program`, `third_program`) VALUES ('$id','$first','$second','$third')";
        $result=mysqli_query($conn,$insert_query);
        if(isset($result))
        {
            
            global $success_counter;
            $success_counter++;
        }
        else
        {
            global $error;
            $error++;
        }
    }
   

    function SubmissionStatus() 
    {
        
        require("db.php");
        testPreferences();
        collegePreferences();
        programPreferences();
        global $success_counter;
        $id=mysqli_real_escape_string($conn,$_POST['id']);
        if($GLOBALS['success_counter']>=3)
        {
            $insertStatus="UPDATE `application_status` SET `status`='almost' WHERE `user_id`='$id'";
            $statusResult=mysqli_query($conn,$insertStatus);
            if (isset($statusResult)) {
                header("Location:./razorpay");
            }
            else
            {
                header("Location:testPreferences.php?error=technical Error");
            }
        }
    }
    SubmissionStatus();
}



?>