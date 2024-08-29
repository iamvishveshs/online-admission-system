<?php
session_start();
require("db.php");
if(isset($_SESSION['id']))
{
    header("Location:index.php");
}
if (isset($_REQUEST['login'])) 
{
    $email = mysqli_real_escape_string($conn, $_REQUEST['email']);
    $pass = md5(mysqli_real_escape_string($conn, $_REQUEST['pass']));
    $query = "SELECT * from `user` WHERE `email`='$email' AND `pass`='$pass'";

    if ($result = mysqli_query($conn, $query)) 
    {
        if (mysqli_num_rows($result) > 0) 
        {
            $row = mysqli_fetch_assoc($result);
            if ($row['role']=="applicant") {
                $_SESSION['id'] = $row['id'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['email']= $row['email'];
                header("Location:index.php");
            }
            else
            {
                $_SESSION['admin_id'] = $row['id'];
                header("Location:./admin-panel/index.php");
            }
            
        }
        else{
            header("Location:login.php?error=Wrong username or password.");
        }
    }
    else 
    {
        header("Location:login.php?error=Wrong username or password.");
    }
}
?>
