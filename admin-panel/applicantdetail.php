<?php
require "../db.php";
session_start();
if (isset($_SESSION['admin_id'])) {
$resultDetails = mysqli_query($conn,"SELECT * FROM user WHERE role!='admin'");
require("scripts.php");
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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h3 class="text-center"> Applicants Who have have successfully submited their application Form.</h3>
                        <button id="btnExport" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>
                  <div class="card shadow mb-4 p-3">
                    <?php if ($setting['item']=="application_Submission_Close" && $setting['status']=="true") {
                    ?>
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        
                        <a href="generateRollno.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Generate Roll Numbers</a>
                        <a href="rollNumbers.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">See Roll Numbers</a>
                    </div>
                    <?php 
                    }
                    ?>
                    <div class="text-center">
                    <h2>Applicants (Success)</h2>
                </div>
                <hr>
<div class='card-body'>
<div class='table-responsive'>
<table class='table table-bordered display' id="table">
    <thead>
<tr>
<th>id</th>
<th>name</th>
<th>email</th>
<th>more detail</th>
</tr>
</thead>
<tbody>
<?php
while($rowDetails = mysqli_fetch_array($resultDetails))
{
	$user_id=$rowDetails['id'];
	$checkStatus=mysqli_query($conn,"SELECT * FROM `application_status` WHERE `user_id` ='$user_id'");
	$Status = mysqli_fetch_assoc($checkStatus);
	if($Status != '')
	{
		
		if($Status['status']=="success")
		{
			echo "<tr>";
			echo "<td>" . $rowDetails['id'] . "</td>";
			echo "<td >" . $rowDetails['name'] . "</td>";
			echo "<td >" . $rowDetails['email'] . "</td>";
			echo "<td><a href='applicant.php?applicantId=". $rowDetails['id'] ."'>Check details</a></td>";
            echo "</tr>";
		}	
	}
}

?>
</tbody>
</table>
</div></div>
</div>


                </div>
                
                
            </div>
            <!-- End of Main Content -->

            
    <?php 
require "footer.php";
require "javascript-files.php";
?>
<script type="text/javascript">
    $(document).ready( function () {
    $('#table').DataTable();
} );
</script>

<!-- Generating exel sheet rom the table data-->
   <script type="text/javascript">
 $(document).ready(function(){
    $("#btnExport").click(function() {
        const dateObj = new Date();
        const date = dateObj.getDate()+'/'+((dateObj.getMonth())+1)+'/'+dateObj.getFullYear();

        let table = document.getElementsByTagName("table");
        TableToExcel.convert(table[0], { 
        // html code may contain multiple tables so here we are refering to 1st table tag
           name: `Successful Applicants List till `+date+`.xlsx`, // fileName you could use any name
           sheet: {
              name: 'Sheet 1' // sheetName
           }
        });
    });
});
</script>

</body>

</html>
	<?php 

}
?>