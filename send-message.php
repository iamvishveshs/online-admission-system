<?php
require "db.php";
$name=$_REQUEST['name'];
$email=$_REQUEST['email'];
$subject=$_REQUEST['subject'];
$message=$_REQUEST['message'];

$query = "INSERT INTO `message`(`name`, `email`, `subject`, `message`) VALUES ('$name','$email','$subject','$message')";
$result =mysqli_query($conn,$query);
if (isset($result)) {
	?><script type="text/javascript">alert("Your message is submitted");</script>
	<?php
	header("Location:contact.php");
}
else
{
	?><script type="text/javascript">alert("Your message is not submitted");</script>
	<?php
	header("Location:contact.php");
}
?>