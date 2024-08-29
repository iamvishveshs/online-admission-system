<?php
session_start();
require "../db.php";
if (isset($_SESSION['admin_id'])) {

  $applicant_id=$_REQUEST['applicantId'];
  $sql = "SELECT * FROM user WHERE id ='$applicant_id'";
  $user_details = mysqli_query($conn, $sql);
  $row7=mysqli_fetch_assoc($user_details);

  $sql1 = "SELECT * FROM `applicant_personal_details` WHERE applicant_id ='$applicant_id'";
  $applicant_personal_details = mysqli_query($conn, $sql1);
  $row1=mysqli_fetch_assoc($applicant_personal_details);
  

  $sql2 = "SELECT * FROM `address_details` WHERE applicant_id ='$applicant_id'";
  $address_details = mysqli_query($conn, $sql2);
  $row2=mysqli_fetch_assoc($address_details);
  
  $sql3 = "SELECT * FROM `educational_details` WHERE applicant_id ='$applicant_id'";
  $educational_details = mysqli_query($conn, $sql3);
  $row3=mysqli_fetch_assoc($educational_details);
  

  $sql4 = "SELECT * FROM `document_details` WHERE applicant_id ='$applicant_id'";
  $document_details = mysqli_query($conn, $sql4);
  $row4=mysqli_fetch_assoc($document_details);
  

  $sql5 = "SELECT * FROM `college_preferences` WHERE applicant_id ='$applicant_id'";
  $college_preferences = mysqli_query($conn, $sql5);
  $row5=mysqli_fetch_assoc($college_preferences);

  $sql6 = "SELECT * FROM `test_prefrences` WHERE applicant_id ='$applicant_id'";
  $test_prefrences = mysqli_query($conn, $sql6);
  $row6=mysqli_fetch_assoc($test_prefrences);



  ?>
  <!DOCTYPE html>
  <html>
  <head>
    <title><?php echo $row7['name']; ?>'s Details</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <?php require "head-files.php"; ?>
    <style>
      
      th, td 
      {
        border-color: #96D4D4;
      }
      table
      {
        text-align: center;
      }
    </style>
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
              <div class="text-center" style="color:dimgray;">
                <h2><?php echo $row7['name']; ?>'s Details<span style="color:red;">*</span></h2>
              </div>
              <table border="1px"><tr>
                <th><div class="item">
                Name</th><td><?php echo $row7['name']; ?></td></div></tr>
                
                <tr><th><div class="item">
                  <label for="bdate">Date of Birth</label></th><td>  <?php echo $row1['date_of_birth']; ?></td></tr>
                </div>

                <tr><th><div class="item">
                  <label for="email">Email</label></th><td><?php echo $row7['email']; ?>
                </div></td></tr>

                <tr><th><div class="item">
                  <label for="position">Gender</label></th><td> <?php echo $row1['gender']; ?>
                </div></td></tr>

                <tr><th><div class="item">
                  <label for="position">Contact No</label></th><td> <?php echo $row1['contact_no']; ?>
                </div></td></tr>

                <tr><th><div class="item">
                  <label for="position">Father Name</label></th><td> <?php echo $row1['father_name']; ?>
                </div></td></tr>

                <tr><th><div class="item">
                  <label for="position">Father Contact No</label></th><td> <?php echo $row1['father_contact']; ?>
                </div></td></tr>

                <tr><th><div class="item">
                  <label for="position">Mother Name</label></th><td> <?php echo $row1['mother_name']; ?>
                </div></td></tr>

                <tr><th><div class="item">
                  <label for="position">Religion</label></th><td> <?php echo $row1['religion']; ?>
                </div></td></tr>

                <tr><th><div class="item">
                  <label for="position">Category</label></th><td> <?php echo $row1['category']; ?>
                </div></td></tr>

                <tr><th><div class="item">
                  <label for="position">Sub Category</label></th><td> <?php echo $row1['sub_category']; ?>
                </div></td></tr>

              </table>
              <br>
              <fieldset>
                <center><legend style="color:dimgray;"><ins>Address Details<span style="color:red;">*</span></ins></legend></center>
                <table border="1px" style="width:1043px;">
                  <tr><th><div class="item">
                    <label for="name">Address</label></th><td> <?php echo $row2['address']; ?>
                  </div></td></tr>

                  <tr><th><div class="item">
                    <label for="address">District</label></th><td> <?php echo $row2['district']; ?>
                  </div></td></tr>

                  <tr><th><div class="item">
                    <label for="address">State</label></th><td> <?php echo $row2['state']; ?> 
                  </div></td></tr>

                  <tr><th><div class="item">
                    <label for="address">Pincode</label></th><td> <?php echo $row2['pincode']; ?> 
                  </div></td></tr>

                  
                </table>     
              </fieldset>
              <br>
              <fieldset>
                <center><legend style="color:dimgray;"><ins>Education Details<span style="color:red;">*</span></ins> </legend></center>
                <table border="1px" style="width:1043px;">
                 <tr><th><div class="item">
                  <label for="name">Board Name</label></th><td> <?php echo $row3['board_name']; ?>
                </div></td></tr>

                <tr><th><div class="item">
                  <label for="address">Marks Obtained</label></th><td> <?php echo $row3['marks_obtained']; ?>
                </div></td></tr>

                <tr><th><div class="item">
                  <label for="address">Total Marks</label></th><td> <?php echo $row3['total_marks']; ?> 
                </div></td></tr>

                <tr><th><div class="item">
                  <label for="address">Percentage</label></th><td> <?php echo $row3['percentage']; ?> 
                </div></td></tr>

                <tr><th>Matric Certificate:</th><td>
                  <a href="#" id="pop">
                    <img id="imageresource" src='http://localhost/minorProject/<?php echo $row4["10th_certificate"]; ?>' style="object-fit: contain;" class="m-5">
                  </a></td></tr>
                  
                  <tr><th>Photo:</th><td>
                    <a href="#" id="pop1">
                      <img id="imageresource1" src='http://localhost/minorProject/<?php echo $row4["picture"]; ?>' style="object-fit: contain;" class="m-5">
                    </a></td></tr>
                  </table>
                  
                  
                </fieldset>

                

                
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- Modal for Certificate -->
    <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="myModalLabel"></h4>
          </div>
          <div class="modal-body">
            <img src="" id="imagepreview" style="object-fit: contain;" >
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal for Picture -->
    <div class="modal fade" id="imagemodal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="myModalLabel"></h4>
          </div>
          <div class="modal-body">
            <img src="" id="imagepreview1" style="width:auto;height:auto;object-fit: contain;" >
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <script>
      $("#pop1").on("click", function() {
   $('#imagepreview1').attr('src', $('#imageresource1').attr('src')); // here asign the image to the modal when the user click the enlarge link
   $('#imagemodal1').modal('show'); // imagemodal is the id attribute assigned to the bootstrap modal, then i use the show function
 });

      $("#pop").on("click", function() {
   $('#imagepreview').attr('src', $('#imageresource').attr('src')); // here asign the image to the modal when the user click the enlarge link
   $('#imagemodal').modal('show'); // imagemodal is the id attribute assigned to the bootstrap modal, then i use the show function
 });
</script>

<?php 

require "javascript-files.php";
?>
</body>
</html>
<?php 
}
?>    