<?php
require "../db.php";
session_start();
if (isset($_SESSION['admin_id'])) {
$resultDetails = mysqli_query($conn,"SELECT * FROM rollnumber WHERE applicant_id>0");
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
                        <h3 class="text-center"> Roll Numbers of various Applicants</h3>
                        <button id="btnExport" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>
                  <div class="card shadow mb-4 p-3">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        
                        <a href="deleteRollno.php" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" id="delete">Delete Roll Nos</a>
                    </div>
                    <div class="text-center">
                    <h2>Applicants (With Roll Numbers)</h2>
                </div>
                <hr>
<div class='card-body'>
<div class='table-responsive'>
<table class='table table-bordered display' id="table">
    <thead>
<tr>
<th>Id</th>
<th>Name</th>
<th>Email</th>
<th>RollNo</th>
</tr>
</thead>
<tbody>
<?php
while($rowDetails = mysqli_fetch_array($resultDetails))
{
	$user_id=$rowDetails['applicant_id'];
	$checkStatus=mysqli_query($conn,"SELECT * FROM user WHERE `id` ='$user_id'");
	$Status = mysqli_fetch_assoc($checkStatus);
			echo "<tr>";
			echo "<td>" . $Status['id'] . "</td>";
			echo "<td >" . $Status['name'] . "</td>";
			echo "<td >" . $Status['email'] . "</td>";
            echo "<td >" . $rowDetails['applicant_rollNumber'] . "</td>";
}

?>
</tbody>
</table>
</div></div>


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
           name: `Roll Numbers of successful Applicants `+date+`.xlsx`, // fileName you could use any name
           sheet: {
              name: 'Roll Numbers' // sheetName
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