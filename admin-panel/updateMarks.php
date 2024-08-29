<?php
require "../db.php";
session_start();

if (isset($_SESSION['admin_id'])) {
require("scripts.php");
$user=$_GET['applicantId'];
$marksQuery=mysqli_query($conn,"SELECT * FROM `marks_detail` WHERE `applicant_id`='$user'");
$mark=mysqli_fetch_assoc($marksQuery);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php require "head-files.php"; ?>

</head>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php require "sidebar.php";?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php require "topbar.php";?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    
                  <div class="card shadow mb-4 p-3">
                    
                    <div class="text-center">
                    <h2>Applicants</h2>
                </div>
                <hr>
<div class='card-body'>
<form class="text-center" action="marksSubmission.php" method="post">
		<h4>User id = <?php echo $_GET['applicantId']; ?></h4>
		<input type="text" name="applicantid" value="<?php echo $_GET['applicantId']; ?>" hidden>
		<label for="fmarks"> Marks Obtained: </label>
		<input type="text" name="marks" value="<?php echo $mark['marks']; ?>" required><br>
		<input type="submit" value="submit" name="update" class="btn btn-success">
</form>
</div>
</div>


                </div>
                
                
            </div>
            <!-- End of Main Content -->

            
    <?php 
require "footer.php";
require "javascript-files.php";
?>

</body>

</html>
	<?php 

}
?>