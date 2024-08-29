<?php
require "../db.php";
session_start();
if (isset($_SESSION['admin_id'])) {
    $resultDetails = mysqli_query($conn,"SELECT * FROM user WHERE role!='admin'");
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


                <div class="container-fluid">
                    <div class="text-center">
                        <h2>Applicants (Success)</h2>
                    </div>
                    <hr>
                    <div class='card-body'>
                        <div class='table-responsive'>
                            <table class='table table-bordered'>
                                <tr>
                                    <th>id</th>
                                    <th>name</th>
                                    <th>email</th>
                                    <th>more detail</th>
                                </tr>
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
                                        $checkMarks=mysqli_query($conn,"SELECT * FROM `marks_detail` WHERE `applicant_id`='$user_id'");
                                        $marks=mysqli_fetch_assoc($checkMarks);
                                         echo "<tr>";
                                         echo "<td>" . $rowDetails['id'] . "</td>";
                                         echo "<td >" . $rowDetails['name'] . "</td>";
                                         echo "<td >" . $rowDetails['email'] . "</td>";
                                         if (isset($marks['applicant_id'])) {
                                             echo "<td>".$marks['marks']."<br>";
                                             echo "<a href='updateMarks.php?applicantId=". $rowDetails['id'] ."'>Update Marks</a></td>";
                                         }
                                         else
                                         {
                                            echo "<td><a href='addMarks.php?applicantId=". $rowDetails['id'] ."'>Add Marks</a></td>";
                                         }
                                         
                                        }	
                                    }
                                }
                                ?>
                            </table>
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- End of Main Content -->


<?php 
require "footer.php";
require "javascript-files.php";
?>
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