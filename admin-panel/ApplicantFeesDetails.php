<?php
require "../db.php";
session_start();
if (isset($_SESSION['admin_id'])) {
require "./scripts.php";

$FeesQuery = "SELECT * FROM `fees_details`";
$FeesQueryResult =mysqli_query($conn,$FeesQuery);

/*Getting total amount of fees */
$TotalfeesQuery = "SELECT SUM(amount) FROM `fees_details`";
$TotalfeesResult =mysqli_query($conn,$TotalfeesQuery);
$Totalfees=mysqli_fetch_array($TotalfeesResult);


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
                        <h3 class="text-center"></h3>
                        <button id="btnExport" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>
<div class='card shadow mb-4 p-3'>
	<h1 class="text-center">All Registered Applicants</h1>
<div class='table-responsive'>
<table class='table table-bordered display' id="table">
    <thead>
<tr>
<th>id</th>
<th>Name</th>
<th>Email</th>
<th>payment id</th>
<th>Order id</th>
<th>Date</th>
<th>amount</th>

</tr>
</thead>
<tbody>
<?php
while($fees=mysqli_fetch_assoc($FeesQueryResult))
{
    $user_id=$fees['applicant_id'];
    $userQuery=mysqli_query($conn,"SELECT * FROM `user` WHERE `id` ='$user_id'");
    $user = mysqli_fetch_assoc($userQuery);
			echo "<tr>";
			echo "<td>" . $user['id'] . "</td>";
			echo "<td >" . $user['name'] . "</td>";
			echo "<td >" . $user['email'] . "</td>";
            echo "<td>" . $fees['payment_id'] . "</td>";
            echo "<td>" . $fees['order_id'] . "</td>"; 
            echo "<td>" . $fees['date_of_ payment'] . "</td>";
            echo "<td> &#x20b9; " . $fees['amount'] . "</td>";
            echo "</tr>";
            
}

?>
</tbody>
<tfoot><tr><th colspan='7' class='text-center'>Total amount = &#x20b9; <?php echo $Totalfees['SUM(amount)']; ?> </tr>
</tfoot>
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
           name: `Fees Details of Applicants List till `+date+`.xlsx`, // fileName you could use any name
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