<?php
session_start();
require("db.php");
if(isset($_SESSION['id']) && isset($_POST['submit']))
{
    print_r($_FILES);
    $error=0;
    $success_counter=0;
    function personalDetails() 
    {
        require("db.php");
        $id=mysqli_real_escape_string($conn,$_POST['id']);
        $gender=mysqli_real_escape_string($conn,$_POST['gender']);
        $dob=mysqli_real_escape_string($conn,$_POST['dob']);
        $contact=mysqli_real_escape_string($conn,$_POST['mobile']);
        $fatherName=mysqli_real_escape_string($conn,$_POST['fathername']);
        $fatherContact=mysqli_real_escape_string($conn,$_POST['fathermobile']);
        $motherName=mysqli_real_escape_string($conn,$_POST['mothername']);
        $religion=mysqli_real_escape_string($conn,$_POST['religion']);
        $category=mysqli_real_escape_string($conn,$_POST['category']);
        $subCategory=mysqli_real_escape_string($conn,$_POST['sub-category']);
        $insert_query="INSERT INTO `applicant_personal_details`(`applicant_id`, `gender`, `date_of_birth`, `contact_no`, `father_name`, `father_contact`, `mother_name`, `religion`, `category`, `sub_category`) VALUES ('$id','$gender','$dob','$contact','$fatherName','$fatherContact','$motherName','$religion','$category','$subCategory')";
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

    function addressDetails() 
    {
        require("db.php");
        $id=mysqli_real_escape_string($conn,$_POST['id']);
        $address=mysqli_real_escape_string($conn,$_POST['address']);
        $district=mysqli_real_escape_string($conn,$_POST['district']);
        $state=mysqli_real_escape_string($conn,$_POST['state']);
        $pincode=mysqli_real_escape_string($conn,$_POST['pincode']);
        
        $insert_query="INSERT INTO `address_details`(`applicant_id`, `address`, `district`, `state`, `pincode`) VALUES ('$id','$address','$district','$state','$pincode')";
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
    function documentDetails() 
    {
        require("db.php");
        $id=mysqli_real_escape_string($conn,$_POST['id']);
        $certificate_without_ext = substr($_FILES['certificate']['name'], 0, strrpos($_FILES['certificate']['name'], "."));
        $certificateFilename = $certificateFinalFilename = preg_replace('`[^a-z0-9-_.]`i','',$_FILES['certificate']['name']);
        /*pathinfo() returns the information about the file path like pathinfo_dirname, BASENAME, EXTENSION, FILENAME. */
        $certificateParts=pathinfo($certificateFinalFilename);
        /*getting the extension of the file */
        $certificateExtension = $certificateParts['extension'];
        /*creating unique filename by salting current date and time inside the file name*/
        $certificate_name = $certificate_without_ext . date("dmyhis") ."." . $certificateExtension;
        $certificate_file = "PAT-documents/certificate/" .$certificate_name;
        $certificateUpload=move_uploaded_file($_FILES['certificate']['tmp_name'],$certificate_file);


            //for picture
        $picture_without_ext = substr($_FILES['picture']['name'], 0, strrpos($_FILES['picture']['name'], "."));
        $pictureFilename = $pictureFinalFilename = preg_replace('`[^a-z0-9-_.]`i','',$_FILES['picture']['name']);
        /*pathinfo() returns the information about the file path like pathinfo_dirname, BASENAME, EXTENSION, FILENAME. */
        $pictureParts=pathinfo($pictureFinalFilename);
        /*getting the extension of the file */
        $pictureExtension = $pictureParts['extension'];
        /*creating unique filename by salting current date and time inside the file name*/
        $picture_name = $picture_without_ext . date("dmyhis") ."." . $pictureExtension;
        $picture_file = "PAT-documents/picture/" .$picture_name;
        $pictureUpload=move_uploaded_file($_FILES['picture']['tmp_name'],$picture_file );
        if( $certificateUpload && $pictureUpload) 
        {
            $insertquery ="INSERT INTO `document_details`(`applicant_id`, `10th_certificate`, `picture`) VALUES ('$id','$certificate_file','$picture_file')";
            $result = mysqli_query($conn, $insertquery);
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
    }
    
    function qualificationDetails() {
        require("db.php");
        $id=mysqli_real_escape_string($conn,$_POST['id']);
        $board=mysqli_real_escape_string($conn,$_POST['board']);
        $marksObtained=mysqli_real_escape_string($conn,$_POST['marksObtained']);
        $totalMarks=mysqli_real_escape_string($conn,$_POST['totalMarks']);
        $percentage=mysqli_real_escape_string($conn,$_POST['percentage']);

        $insert_query="INSERT INTO `educational_details`(`applicant_id`, `board_name`, `marks_obtained`, `total_marks`, `percentage`) VALUES ('$id','$board','$marksObtained','$totalMarks','$percentage')";
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
        personalDetails();
        addressDetails();
        documentDetails();
        qualificationDetails();
        global $success_counter;
        echo $success_counter;
        $id=mysqli_real_escape_string($conn,$_POST['id']);
        if($GLOBALS['success_counter']>=4)
        {
            $insertStatus="INSERT INTO `application_status`(`user_id`, `status`) VALUES ('$id','partial')";
            $statusResult=mysqli_query($conn,$insertStatus);
            if (isset($statusResult)) {
                header("Location:testPreferences.php");
            }
            else
            {
                header("Location:applicationPAT.php?error=technical Error");
            }
        }
    }
    SubmissionStatus();
}



?>