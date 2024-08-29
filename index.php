<?php
session_start();
require("db.php");
if(isset($_SESSION['id']))
{
    $id=$_SESSION['id'];
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">

      <title>Online Admission System - OAS</title>
      <meta content="" name="description">
      <meta content="" name="keywords">
  </head>

  <body>
    <?php require "databaseQueries.php"; ?>
    <?php require "navbar.php"; ?>


    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex justify-content-center align-items-center">
        <div class="container position-relative text-center" data-aos="zoom-in" data-aos-delay="100">

            <?php 
            $query="SELECT * FROM `application_status` WHERE `user_id`='$id'";
            $result=mysqli_query($conn,$query);
            $row=mysqli_fetch_assoc($result);
            if($row>0)
            {
                if($row['status']=="partial" && $setting['item']=="application_Submission_Close" && $setting['status']=="false")
                {


                    ?>
                    <h1>Welcome Back</h1>
                    <h2>Hurry up, Fill the partially filled form of PAT. <br> Some of your admission details are not filled yet.</h2>
                    <a href="testPreferences.php" class="btn-get-started">Set Prefrences now</a>
                    <?php
                }
                else if($row['status']=="partial" && $setting['item']=="application_Submission_Close" && $setting['status']=="true")
                {


                    ?>
                    <h1>Sorry ! You are Late.</h1>
                    <h2>Registeration for PAT (Polytechnic Admission Test) is Closed.</h2>
                    <h2>Your Application Will not be considered for admission procedure.</h2>
                    <?php
                }
                else if($row['status']=="almost" && $setting['item']=="application_Submission_Close" && $setting['status']=="false")
                {


                    ?>
                    <h1>Welcome Back</h1>
                    <h2>Hurry up, Payment Is not done yet.</h2>
                    <a href="./razorpay" class="btn-get-started">Pay Application Fee</a>
                    <?php
                }
                else if($row['status']=="almost" && $setting['item']=="application_Submission_Close" && $setting['status']=="true")
                {


                    ?>
                    <h1>Sorry ! You are Late.</h1>
                    <h2>Registeration for PAT (Polytechnic Admission Test) is Closed.</h2>
                    <h2>Your Application Will not be considered for admission procedure.</h2>
                    <?php
                }
                else if($row['status']=="success")
                {
                    if ($AdmitCard['item']=="Release_Admit_Card" && $AdmitCard['status']=="true")
                    {
                        ?>
                       <h1>Admit Card Released !!!</h1>
                       <h2>Download your admit card Now.</h2>
                       <a href="admitCard.php" class="btn-get-started">Download Admit Card</a>
                       <?php

                   }
                   elseif($Result['item']=="ReleaseResult" && $Result['status']=="true")
                       {
                        ?>
                        <h1>Result is Out !!!</h1>
                       <h2>Lets have a look Now.</h2>
                       <a href="Result.php" class="btn-get-started">Result</a>
                        <?php
                       }
                   else
                   {
                    ?>
                    <h2>Congratulations, Successfully Submitted.</h2>
                    <p>You have successfully submitted your application. Please stay updated by regularly checking the website for furthur Notifications.</p>
                    <a href="./downloadReceipt.php" class="btn-get-started">Print Receipt</a>
                    <?php

                }
            }
        }
        elseif ($setting['item']=="application_Submission_Close" && $setting['status']=="false") 
        {
            ?>
            <h2>Welcome, Apply for Polytechnic admission Test.</h2>
            <a href="applicationPAT.php" class="btn-get-started">Apply for PAT</a>
            <?php
        }
        elseif ($setting['item']=="application_Submission_Close" && $setting['status']=="true") {
            ?>
            <h1>Sorry !!!</h1>
            <h2>Registeration for PAT (Polytechnic Admission Test) is Closed.</h2>

            <?php
        }
        else
        {

        }
        ?>

    </div>
</section><!-- End Hero -->

<main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <img src="assets/img/about.jpg" class="img-fluid" alt="">
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3>Important Instructions</h3>
            <p class="fst-italic">
              Please read these instructions carefully and fill the form accordingly :
          </p>
          <ul>
              <li><i class="bi bi-check-circle"></i>All the data filled by you will be checked and if found wrong than we can take a strict action on you.</li>
              <li><i class="bi bi-check-circle"></i>Your scanned passport sized photograph.</li>
              <li><i class="bi bi-check-circle"></i>Scanned photograph of 10th certificate.</li>
              <li><i class="bi bi-check-circle"></i>Blur images are not allowed.</li>
          </ul>
          <p>

          </p>

      </div>
  </div>

</div>
</section><!-- End About Section -->


<?php require "footer.php"; ?>

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


<?php require "scripts.php"; ?>
</body>

</html>

<?php
}
else
{
    header("Location: login.php");
}

?>