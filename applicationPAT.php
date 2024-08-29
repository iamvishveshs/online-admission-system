<?php
session_start();
require("db.php");
if(isset($_SESSION['id']))
{
    $id=$_SESSION['id'];
    require "check.php";
    if(!isset($check['status']))
    {
        $query="SELECT * FROM `user` WHERE `id`='$id'";
        $result=mysqli_query($conn,$query);
        $row=mysqli_fetch_assoc($result);
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <script src="https://code.jquery.com/jquery-3.6.1.slim.min.js" integrity="sha256-w8CvhFs7iHNVUtnSP0YKEg00p9Ih13rlL9zGqvLdePA=" crossorigin="anonymous"></script>
            <title>PAT Application form</title>
            
        </head>
        <body>

            <?php require "navbar.php"; ?>
            <?php if (isset($_GET['error'])) { ?>
                <div>
                    <?php echo $_GET['error']; ?>
                </div>
            <?php } ?>
            

            <div class="container">
                <div class="details shadow-sm rounded">
                    <h1>Application For Polytechnic Addmission Test (PAT)</h1>
                    <section class="container b-1 instructions">
                        <span class="instruction-child">All the fields with <span style="color:red;">*</span> are compulsorry.</span>
                        <span class="instruction-child">Fill the details according to your 10th Certificate</span>
                        <span class="instruction-child">Your passport size photograph for profile image</span>
                        <span class="instruction-child">10th certificate image should be clearly visible and must be in one of these (.png, .jpeg, .jpg) format</span>
                    </section>

                </div>
                <form method="post" enctype="multipart/form-data"  action="pat-data-submission.php">
                    <fieldset class="shadow-sm">
                        <legend class="form-heading m-2">Personal Details</legend>
                        <div class="formContainer ">
                            <!--<label for="name" class="formLabel required">id</label>-->
                            <input type="text" name="id" id="id"
                            value="<?php if(isset($row['id'])) { echo $row['id'];} else { echo"";}  ?>" hidden required>
                            <div class="form">
                                <label for="name" class="formLabel required">Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="e.g. Vivek Sharma" 
                                value="<?php if(isset($row['name'])) { echo $row['name'];} else { echo"";}  ?>" readonly required>
                            </div>
                            <div class="form">
                                <label for="email" class="formLabel required">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="e.g. demo134@gmail.com" 
                                value="<?php if(isset($row['email'])) { echo $row['email'];} else { echo"";}  ?>" pattern="^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$" readonly required>
                            </div>
                            <div class="form">
                                <label for="dob" class="formLabel required">Date of Birth</label>
                                <input type="date" name="dob" id="dob" max="2010-12-31" class="form-control" required>
                            </div>
                            <div class="form">
                                <label for="fatherName" class="formLabel required">Father's Name</label>
                                <input type="text" name="fathername" id="fatherName" class="form-control" placeholder="e.g. Rajiv Sharma" required>
                            </div>
                            <div class="form">
                                <label for="motherName" class="formLabel required">Mother's Name</label>
                                <input type="text" name="mothername" id="motherName"  class="form-control" placeholder="e.g. Shalini Sharma" required>
                            </div>
                            <div class="form">
                                <label for="mobile" class="formLabel required">Mobile Number</label>
                                <input type="text" name="mobile" id="mobile" class="form-control" placeholder="e.g. 9876543210" required>
                            </div>
                            <div class="form">
                                <label for="fathermobile" class="formLabel required">Father's Mobile Number</label>
                                <input type="text" name="fathermobile" id="fathermobile" class="form-control" placeholder="e.g. 1234567890" required>
                            </div>
                            <div class="form">
                                <label for="gender" class="formLabel  required">Gender</label>
                                <select name="gender" class="form-select" required>
                                    <option>Select option</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                        </div>
                    </fieldset>
                    <div class="space"></div>
                    <fieldset class="shadow-sm ">
                        <legend class="form-heading m-2">Address Details</legend>
                        <div class="formContainer">
                            <div class="form">
                                <label for="address" class="formLabel required">Address</label>
                                <input type="text" name="address" id="address" class="form-control" placeholder="e.g Baloh,Ghumarwin" required>
                            </div>
                            <div class="form">
                                <label for="district" class="formLabel required">District</label>
                                <input type="text" name="district" id="district" class="form-control" placeholder="e.g. Bilaspur" required>
                            </div>
                            <div class="form">
                                <label for="state" class="formLabel required">State</label>
                                <select name="state" id="state" class="form-select">
                                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                    <option value="Assam">Assam</option>
                                    <option value="Bihar">Bihar</option>
                                    <option value="Chhattisgarh">Chhattisgarh</option>
                                    <option value="Goa">Goa</option>
                                    <option value="Gujarat">Gujarat</option>
                                    <option value="Haryana">Haryana</option>
                                    <option value="Himachal Pradesh" selected>Himachal Pradesh</option>
                                    <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                    <option value="Jharkhand">Jharkhand</option>
                                    <option value="Karnataka">Karnataka</option>
                                    <option value="Kerala">Kerala</option>
                                    <option value="Madhya Pradesh">Madhya Pradesh</option>
                                    <option value="Maharashtra">Maharashtra</option>
                                    <option value="Manipur">Manipur</option>
                                    <option value="Meghalaya">Meghalaya</option>
                                    <option value="Mizoram">Mizoram</option>
                                    <option value="Nagaland">Nagaland</option>
                                    <option value="Odisha">Odisha</option>
                                    <option value="Punjab">Punjab</option>
                                    <option value="Rajasthan">Rajasthan</option>
                                    <option value="Sikkim">Sikkim</option>
                                    <option value="Tamil Nadu">Tamil Nadu</option>
                                    <option value="Telangana">Telangana</option>
                                    <option value="Tripura">Tripura</option>
                                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                                    <option value="Uttarakhand">Uttarakhand</option>
                                    <option value="West Bengal">West Bengal</option>
                                </select>
                            </div>
                            <div class="form">
                                <label for="pincode" class="formLabel required">Pincode</label>
                                <input type="text" name="pincode" id="pincode" class="form-control" placeholder="e.g. 175024" required>
                            </div>
                        </div>
                    </fieldset>
                    <div class="space"></div>
                    <fieldset class="shadow-sm">
                     <legend class="form-heading m-2">Qualification - Matriculation Details</legend>
                     <div class="formContainer">
                        <div class="form">
                            <label for="board" class="formLabel required">Board Name</label>
                            <input type="text" name="board" id="board" class="form-control" placeholder="e.g. HPBOSE" required>
                        </div>
                        <div class="form">
                            <label for="marksObtained" class="formLabel required">Marks Obtained</label>
                            <input type="number" name="marksObtained" class="form-control" id="marksObtained" placeholder="e.g. 600" onchange="calculatePercentage()" required>
                        </div>
                        <div class="form">
                            <label for="totalMarks" class="formLabel required">Total Marks</label>
                            <input type="number" name="totalMarks" id="totalMarks" class="form-control" placeholder="e.g. 700" onchange="calculatePercentage()" required>
                        </div>
                        <div class="form">
                            <label for="percentage" class="formLabel required">Percentage</label>
                            <input type="text" name="percentage" id="percentage" class="form-control" required placeholder="Click to generate" readonly>
                        </div>
                    </div>
                </fieldset>
                <div class="space"></div>
                <fieldset class="shadow-sm">
                 <legend class="form-heading m-2">Category Details</legend>
                 <div class="formContainer">
                    <div class="form">
                        <label for="religion" class="formLabel required">Religion</label>
                        <select name="religion" class="form-select" required>
                            <option>Select Religion</option>
                            <option value="hindu">Hindu</option>
                            <option value="muslim">Muslim</option>
                            <option value="sikh">Sikh</option>
                            <option value="christian">Christian</option>
                            <option value="buddhist">Buddhist</option>
                            <option value="jain">Jain</option>
                        </select>
                    </div>
                    <div class="form">
                        <label for="category" class="formLabel required">Category</label>
                        <select name="category" class="form-select" required>
                            <option>Select Category</option>
                            <option value="general">General</option>
                            <option value="obc">OBC</option>
                            <option value="sc">SC</option>
                            <option value="st">ST</option>
                        </select>
                    </div>
                    <div class="form">
                        <label for="sub-category" class="formLabel required">Sub - Category</label>
                        <select name="sub-category" class="form-select" required>
                            <option value="unreserved" selected>Unreserved</option>
                            <option value="ews">EWS</option>
                        </select>
                    </div>
                </div>
            </fieldset>
            <div class="space"></div>
            <fieldset class="shadow-sm">
             <legend class="form-heading m-2">Documents</legend>
             <div>
                <section class="instructions">
                    <span class="instruction-child left">All the documents should be Image format (.jpeg, .jpg, .png) only</span>
                    <span class="instruction-child left">Your image size should be less than 100 kb</span>
                    <span class="instruction-child left">10th certificate image should be clearly visible and size must be less than 200 kb</span>
                    
                </section>
            </div>
            <div class="formContainer">
                <div class="form-file">
                    <label for="certificate" class="formLabel required">10th Certificate</label>
                    <input type="file" name="certificate" id="certificate" accept="image/x-png,image/jpg,image/jpeg" class="form-control " oninput="CheckCertificate()" required>
                </div>
                <div class="form-file">
                    <label for="picture" class="formLabel required">Your picture</label>
                    <input type="file" name="picture" id="picture"  accept="image/x-png,image/jpg,image/jpeg" class="form-control" oninput="Checkpicture()" required>
                </div>
            </div>
        </fieldset>
        <div class="text-center mb-5">
            <input type="submit" name="submit" class="btn btn-primary" value="Submit and proceed">
        </div>
    </form>
</div>
<?php require "footer.php"; ?>
<script type="text/javascript">
    function checkCertificateSize()
    {
        const fi = document.getElementById('certificate');
        // Check if any file is selected.
        if (fi.files.length > 0) {
            for (const i = 0; i <= fi.files.length - 1; i++) {

                const fsize = fi.files.item(i).size;
                const file = Math.round((fsize / 1024));
                // The size of the file.
                if (file >= 200) {
                    alert(
                      "please select a file less than 200kb");
                    fi.value="";
                } else {

                    return true;
                }
            }
        }
    }
    function checkPictureSize()
    {
        const fi = document.getElementById('picture');
        // Check if any file is selected.
        if (fi.files.length > 0) {
            for (const i = 0; i <= fi.files.length - 1; i++) {

                const fsize = fi.files.item(i).size;
                const file = Math.round((fsize / 1024));
                // The size of the file.
                if (file >= 100) {
                    alert(
                      "please select a file less than 100kb");
                    fi.value="";
                } else {
                    return true;
                }
            }
        }
    }
    function CheckCertificate()
    {
        var fup = document.getElementById('certificate');
        var fileName = fup.value;
        var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
        if(ext == "jpg" || ext == "jpeg" || ext == "png")
        {

            checkCertificateSize();
            
        } 
        else
        {
            fup.value="";
            alert("Upload jpeg, jpg, png files only");
            fup.focus();
            return false;
        }
    }

    function Checkpicture()
    {
        var fup = document.getElementById('picture');
        var fileName = fup.value;
        var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
        if(ext == "jpg" || ext == "jpeg" || ext == "png")
        {

            checkPictureSize();
        } 
        else
        {
            fup.value="";
            alert("Upload jpeg, jpg, png files only");
            fup.focus();
            return false;
        }
    }
    function calculatePercentage()
    {
        var marksObtained = document.getElementById('marksObtained').value;
        var totalMarks = document.getElementById('totalMarks').value;
        var result = (marksObtained / totalMarks) * 100;
        var percentage = document.getElementById("percentage");
        if (marksObtained == "" || totalMarks == "") {
            percentage.value = "0";
        }
        else
        {
            percentage.value = result.toFixed(2) + "%";
        }
        
    }
    
</script>
</body>
</html>

<?php
}
else if($row['status']=="partial")
{
    header("Location:testPreferences.php");
}
else if($row['status']=="almost")
{
    header("Location:./razorpay");

}
else if($row['status']=="success")
{
    header("Location:index.php");

}
}
else
{
    header("Location: login.php");
}

?>