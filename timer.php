<?php
session_start();
require("db.php");
if(isset($_SESSION['id']))
{
    $id=$_SESSION['id'];
    $query="SELECT * FROM `user` WHERE `id`='$id'";
    $result=mysqli_query($conn,$query);
    $row=mysqli_fetch_assoc($result);

    if(isset($_POST['signup']))
    {


        $name=mysqli_real_escape_string($conn,$_POST['name']);
        $email=mysqli_real_escape_string($conn,$_POST['email']);
        $pass=md5(mysqli_real_escape_string($conn,$_POST['pass']));
        $query="INSERT INTO `user` (name,email,pass) VALUES ('$name','$email','$pass')";
        if(mysqli_query($conn,$query))
        {
            $success= "Your account is created";
            header("Location:login.php?".$success);
        }
        else
        {
            header("Location:signup.php?error=error in creating user account.");
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./pat.css">
    <title>Document</title>

</head>

<body>
    <progress value="0" max="10" id="progressBar"></progress>
    <div>
        <p>You will be redirected to another page in
            <span id="timer"></span> 
            .
        </p>
    </div>

    <script type="text/javascript">var timeleft = 10;
    var downloadTimer = setInterval(function(){
      if(timeleft <= 0){
        clearInterval(downloadTimer);
    }
    document.getElementById("progressBar").value = 10 - timeleft;
    document.getElementById("timer").innerHTML = timeleft;
    timeleft -= 1;
}, 1000)
    ;
</script>
</body>