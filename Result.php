<?php
session_start();
require("db.php");
if(isset($_SESSION['id']))
{
	$user=$_SESSION['id'];
$marksQuery=mysqli_query($conn,"SELECT * FROM `marks_detail` WHERE `applicant_id`='$user'");
$mark=mysqli_fetch_assoc($marksQuery);
	?>
	<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Result</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
</head>

<body>
  <?php require "navbar.php"; ?>

  <main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Result</h2>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="container-fluid text-center">
            <h3 class="text-center">Result Of PAT(Polytechnic Admission Test)</h3>
            <p class="mx-5 ">
            	Your marks are
            	<div style="font-size:1.5rem;font-weight: bolder;">
            		<?php echo $mark['marks']; ?>
            	</div>
            	List of 1st counselling will be realsed soon...
             </p>

          </div>
        </div>

      </div>
    </section><!-- End About Section -->


    

  </main><!-- End #main -->

  <?php require "footer.php"; ?>

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


  <?php require "scripts.php"; ?>
</body>

</html>
	<?php
}
?>