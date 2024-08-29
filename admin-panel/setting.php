<?php
require "../db.php";
session_start();
if (isset($_SESSION['admin_id'])) {
    $settingQuery=mysqli_query($conn,"SELECT * FROM `setting` WHERE id='1'");
$setting=mysqli_fetch_assoc($settingQuery);

$AdmitCardQuery=mysqli_query($conn,"SELECT * FROM `setting` WHERE id='2'");
$AdmitCard=mysqli_fetch_assoc($AdmitCardQuery);

$ResultQuery=mysqli_query($conn,"SELECT * FROM `setting` WHERE id='3'");
$Result=mysqli_fetch_assoc($ResultQuery);

    ?>
    <!DOCTYPE html>
    <html>
    <head>
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <?php require "head-files.php"; ?>
       <link href="css/Settings.css" rel="stylesheet" type="text/css">
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
                        <h3 class="text-center"> </h3>
                    </div>
                    <div class="card shadow mb-4 p-3">

                        <div class="text-center">
                            <h2>Settings</h2>
                        </div>
                        <hr>
                        <div class='card-body'>

                            <div class="switch-holder">
                                <div class="switch-label">
                                    <span>Admission Submission</span>
                                </div>
                                <div class="switch-toggle">
                                    <input type="checkbox" id="admissionOpen" <?php 
                                    if ($setting['item']=="application_Submission_Close" && $setting['status']=="true") {

                                        echo "Checked";
                                    } ?>
                                    >
                                    <label for="admissionOpen"></label>
                                </div>
                            </div>
                            <br>


                            <div class="switch-holder">
                                <div class="switch-label">
                                    <span>Release Admit Card</span>
                                </div>
                                <div class="switch-toggle">
                                    <input type="checkbox" id="ReleaseAdmitCard" <?php 
                                    if ($AdmitCard['item']=="Release_Admit_Card" && $AdmitCard['status']=="true") {

                                        echo "Checked";
                                    } ?>
                                    >
                                    <label for="ReleaseAdmitCard"></label>
                                </div>
                            </div>
                            <br>
                            <div class="switch-holder">
                                <div class="switch-label">
                                    <span>Release Result</span>
                                </div>
                                <div class="switch-toggle">
                                    <input type="checkbox" id="ReleaseResult" <?php 
                                    if ($Result['item']=="ReleaseResult" && $Result['status']=="true") {

                                        echo "Checked";
                                    } ?>
                                    >
                                    <label for="ReleaseResult"></label>
                                </div>
                            </div>
                        </div>
                        <!-- End of Main Content -->



                        <script type="text/javascript">
                            let admissionOpen = document.getElementById("admissionOpen");

// Adding event listener to button
                            admissionOpen.addEventListener("click", () => {

    // Fetching Button value
                                let btnValue = admissionOpen.value;

    // jQuery Ajax Post Request
                                $.post('changeSettings.php', {
                                    btnValue: btnValue
                                }, (response) => {
        // response from PHP back-end
                                    console.log(response);
                                });
                            });

                            let ReleaseAdmitCard = document.getElementById("ReleaseAdmitCard");
                            ReleaseAdmitCard.addEventListener("click", () => {

    // Fetching Button value
                                let ReleaseAdmitCardValue = ReleaseAdmitCard.value;

    // jQuery Ajax Post Request
                                $.post('changeSettings.php', {
                                    ReleaseAdmitCardValue: ReleaseAdmitCardValue
                                }, (response) => {
        // response from PHP back-end
                                    console.log(response);
                                });
                            });

                            let ReleaseResult = document.getElementById("ReleaseResult");
                            ReleaseResult.addEventListener("click", () => {

    // Fetching Button value
                                let ReleaseResultValue = ReleaseResult.value;

    // jQuery Ajax Post Request
                                $.post('changeSettings.php', {
                                    ReleaseResultValue: ReleaseResultValue
                                }, (response) => {
        // response from PHP back-end
                                    console.log(response);
                                });
                            });

                        </script> 

                        <?php 
                        require "footer.php";
                        require "javascript-files.php";
                        ?>

                        <?php 

                    }
                ?>