<?php
session_start();
require("db.php");
if(isset($_SESSION['id']))
{
$applicant_id=$_SESSION['id'];
$sql = "SELECT id,name, email FROM user WHERE id ='$applicant_id'";
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);

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

$sql7="SELECT * FROM `rollnumber` WHERE applicant_id ='$applicant_id'";
$applicant_rollNumber=mysqli_query($conn, $sql7);
$row7=mysqli_fetch_assoc($applicant_rollNumber);





?>
<!DOCTYPE html>
<html>
<head>
  <title>Admit card</title>

  <style>
    html
    {
      font-size: 1.1rem;
    }
    .mydiv7
    {
      border:1px solid black;
      position: absolute;
      top:75px;
      right: 70px;
      width: 35mm;
      height: 45mm;
      height: auto;
      margin: 2px;
      padding: 2px;



    }
    .picture
    {
      object-fit: contain;
      width: inherit;
      height: auto;
    }
    label
    {
      font-weight: bold;
    }

    .mydiv
    {
      text-align: center;
    }

    .mydiv5
    {
      font-weight: bolder;
    }
    .mydiv3
    {
      text-align: center;
      font-weight: bold;
      margin-left: 100px;
      margin-right: 100px;
      font-family: verdana;
    }

  </style>
</head>
<body>
  <div id="print">
    <div class="mydiv3"><center>Admit Card(PAT)<br>
    Hall ticket for entry in examination hall</center></div>  <br><br>
    <div class="mydiv2">HIMACHAL PRADESH TAKNIKI SHIKSHA BOARD(DHARAMSHALA)<br>

      <div class="mydiv5">
        <br>
        <label for="number">Rollno.:</label><?php echo $row7['applicant_rollNumber']; ?><br></div> 

        <div class="mydiv1"><br>

          <label for="name">Candidate name:</label>  <?php echo $row['name']; ?><br>
          <label for="bdate">Date of Birth:</label>  <?php echo $row1['date_of_birth']; ?><br>
          <label for="position">Gender:</label> <?php echo $row1['gender']; ?><br>
          <label for="position">Father Name:</label> <?php echo $row1['father_name']; ?><br>
          <label for="email">Email:</label> <?php echo $row['email']; ?><br>
          <label for="position">Mother Name:</label> <?php echo $row1['mother_name']; ?><br>

          <label for="position">Category:</label> <?php echo $row1['category']; ?>
        </div>
        <div class="mydiv7">&nbsp;&nbsp;candidate photo:
          <img src="http://localhost/minorProject/<?php echo $row4['picture']; ?>" class="picture" >


        </div>


        <div class="mydiv9"><br>
          <label for="address"> Permanent Address:</label> <?php echo $row2['address']; ?>
          <?php echo $row2['address']; ?> <?php echo $row2['district']; ?><?php echo $row2['pincode']; ?><br>



        </div> 
        <div class="div1">
          <center><font style="font-family: Verdana; font-weight: bold; font-size: 20px;"> Instructions to the Candidate</font></center><br>
          <font style="font-family: Verdana;  font-size: 13px;"> 
            <p style="margin-left: 100px; margin-right: 100px; font-family: Verdana;">
              1. This Admit Card must be presented for verification at the time of examination, along with at least one
              original(not photocopied or scanned copy) and valid (not expired) photo identification card
              (e.g : Aadhaar Card, Voter ID).
            </p>

            <p style="margin-left: 100px; margin-right: 100px; font-family: Verdana;">
              2. This Admit Card is valid only if the candidate's photograph and signature images are <b> legibly printed</b>.
              Print this on an A4 sized paper using a laser printer preferably a color photo printer.
            </p>

            <p style="margin-left: 100px; margin-right: 100px; font-family: Verdana;">
              3. Candidates should occupy their alloted seats <b>25 minutes before</b> the scheduled start of the examination.
            </p>

            <p style="margin-left: 100px; margin-right: 100px; font-family: Verdana;">
              4. Candidates will not be allowed to enter the examination hall <b>30 minutes</b>
              after the commencement of the examination.
            </p>

            <p style="margin-left: 100px; margin-right: 100px; font-family: Verdana;">
              5. Mobile phones or any other Electronic gadgets are NOT ALLOWED inside the examination hall. There may not be any
              facility for the safe-keeping of your gadget outside the hall, so it may be easier to leave it at your residence.
            </p>

          </font>
        </div>
        <div class="mydiv">
          <h2>Note:candidate should posses this admit card while entering in the examination hall.</h2>
        </div>


      </div>
      <div class="print">
        <center><input type="button" id="print" class="toggle btn btn-primary" value="Print" onclick="printpage();"></center>
        <script>

          function printpage()
          {
            var area = document.getElementById("print");
            var printpage = window.open();
            printpage.document.write(area.innerHTML);
            printpage.document.close();
            printpage.focus();
            printpage.print();
            printpage.close();
          }
        </script>

      </div>
















    </fieldset>


  </div>


</form>
</div>
</body>
</html>
<?php
  }
?>