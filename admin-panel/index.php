<?php 
session_start();
require "../db.php";
require "scripts.php";
if (isset($_SESSION['admin_id'])) {
	
	?><!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Online admission system - Dashboard</title>

    <?php require "head-files.php"; ?>
    <script src="https://cdn.anychart.com/releases/8.0.1/js/anychart-core.min.js"></script>
      <script src="https://cdn.anychart.com/releases/8.0.1/js/anychart-pie.min.js"></script>

</head>
<style type="text/css">
    .hover
    {
        text-decoration-line: none;
    }
</style>
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

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="./ApplicantFeesDetails.php" class="hover">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Fees Collected</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">&#x20b9; <?php 
                                            
                                            echo $fees['SUM(amount)'];
                                             ?></div>
                                        </div>
                                        <div class="col-auto">
                                        	<i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="./registeredApplicant.php" class="hover">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Registered Applicants</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php 
                                            echo $totalApplicant['COUNT(*)'];
                                             ?></div>
                                        </div>
                                        <div class="col-auto">
                                            
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                    

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="./applicantdetail.php" class="hover">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Successful Applications</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
                                            echo $successfulApplication['COUNT(*)'];
                                             ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-check fa-2x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="./pendingApplicants.php" class="hover">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Pending Applications</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php 
                                            
                                            echo $application['COUNT(*)'];
                                             ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    </div>
                    <div class='card shadow mb-4 p-3' id="container" style="width: 100%; height: 400px">
                    </div>

                </div>
                
                
            </div>
            <!-- End of Main Content -->
  <?php 
require "footer.php";
require "javascript-files.php";
?>
<script>
    anychart.onDocumentReady(function() {

  // set the data
  var data = [
      {x: "Success", value: <?php echo $successfulApplication['COUNT(*)'];?>, exploded: true},
      {x: "Partial", value: <?php echo $partialApplication['COUNT(*)'];?>},
      {x: "Almost", value: <?php echo $almostApplication['COUNT(*)'];?>},
      {x: "Others", value: <?php echo $onlyRegistered;?>}
  ];

  // create the chart
  var chart = anychart.pie();

  // set the chart title
  chart.title("Application Status Data By steps (<?php echo $totalApplicant['COUNT(*)']; ?>)");

  // add the data
  chart.data(data);
  // sort elements
    chart.sort("desc");
  // set legend position
  chart.legend().position("right");
  // set items layout
  chart.legend().itemsLayout("vertical");
  // display the chart in the container
  chart.container('container');
  chart.draw();

});
</script>
</body>

</html>
	<?php 

}
?>