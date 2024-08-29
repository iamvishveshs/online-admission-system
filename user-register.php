 <?php
require("db.php");
if(isset($_POST['signup']))
{


    $name=mysqli_real_escape_string($conn,$_POST['name']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $pass=md5(mysqli_real_escape_string($conn,$_POST['pass']));
    $check_query="SELECT * FROM `user` WHERE `email`='$email'";
    $check_query_result = mysqli_query($conn, $check_query);
    if (mysqli_num_rows($check_query_result) > 0) 
    {
        header("Location:signup.php?error=1&email=".$_POST['email']);
    } 
    else
    {


        $query="INSERT INTO `user` (name,email,pass,role) VALUES ('$name','$email','$pass','applicant')";
        if(mysqli_query($conn,$query))
        {
            $success= "Your account is created";
            header("Location:login.php?success=".$success."&email=".$_POST['email']."&pass=".$_POST['pass']);
        }
        else
        {
            header("Location:signup.php?error=error in creating user account.");
        }
    }
}
else
{
    header("Location:signup.php");   
}
?>