<?php
session_start();
require("db.php");
if(isset($_SESSION['id']))
{
    $id=$_SESSION['id'];
    require "check.php";
    if($check['status']=="partial")
    {

        ?>  
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <script src="assets/js/jquery.js" ></script>
            <title>PAT Application form - preferences</title>


        </head>
        <body>
            <?php require "navbar.php"; ?>
            <?php if (isset($_GET['error'])) { ?>
                <div>
                    <?php echo $_GET['error']; ?>
                </div>
            <?php } ?>

            <div class="container">

                <div class="details">
                    <h1>Preferences For Polytechnic Addmission Test (PAT)</h1>


                </div>
                <form method="post"  action="test-prefrences-submission.php">
                    <fieldset class="shadow-sm">
                        <legend class="form-heading m-3">Admission test Preferences</legend>
                        <div class="formContainer">
                            <input type="text" name="id" id="id"
                            value="<?php if($id) { echo $id;} else { echo"";}  ?>" hidden>
                            <div class="form">
                                <label for="firstLocation" class="formLabel required">1<sup>st</sup> preference</label>
                                <select name="firstLocation" id="firstLocation" class="form-control" onchange="secondLocationList()" required>
                                    <option selected>Select</option>

                                    <?php 
                                    $firstQuery = "SELECT * FROM `district` ORDER BY `district_id` ASC";
                                    $result=mysqli_query($conn,$firstQuery);
                                    if(mysqli_num_rows($result)>0)
                                    {
                                        while ($row=mysqli_fetch_assoc($result)) {
                                            ?><option value="<?php echo $row['district_id'];?>"><?php echo $row['district_name'];?></option><?php
                                        }


                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form">
                                <label for="secondLocation" class="formLabel required">2<sup>nd</sup> preference</label>
                                <select name="secondLocation" id="secondLocation" class="form-control" onchange="thirdLocationList()"required>
                                    <option>
                                        Select any Location in the first list
                                    </option>
                                </select>
                            </div>
                            <div class="form">
                                <label for="thirdLocation" class="formLabel required">3<sup>rd</sup> preference</label>
                                <select name="thirdLocation" id="thirdLocation" class="form-control"required>
                                    <option>
                                        Select any Location in the second list
                                    </option>
                                </select>
                            </div>
                        </div>
                    </fieldset>


                    <fieldset class="shadow-sm">
                        <legend class="form-heading m-3">College Preferences</legend>
                        <div class="formContainer">
                            <!--<label for="name" class="formLabel required">id</label>-->  
                            <div class="form">
                                <label for="first" class="formLabel required">1<sup>st</sup> preference</label>
                                <select name="first" id="first" class="form-control" onchange="secondList()" required>
                                    <option selected>Select</option>

                                    <?php 
                                    $firstQuery = "SELECT * FROM `colleges` ORDER BY `college_id` ASC";
                                    $result=mysqli_query($conn,$firstQuery);
                                    if(mysqli_num_rows($result)>0)
                                    {
                                        while ($row=mysqli_fetch_assoc($result)) {
                                            ?><option value="<?php echo $row['college_id'];?>"><?php echo $row['college_name'];?></option><?php
                                        }


                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form">
                                <label for="second" class="formLabel required">2<sup>nd</sup> preference</label>
                                <select name="second" id="second" class="form-control" onchange="thirdList()"required>
                                    <option>
                                        Select any college in the first list
                                    </option>
                                </select>
                            </div>
                            <div class="form">
                                <label for="third" class="formLabel required">3<sup>rd</sup> preference</label>
                                <select name="third" id="third" class="form-control"required>
                                    <option>
                                        Select any college in the second list
                                    </option>
                                </select>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="shadow-sm">
                        <legend class="form-heading m-3">Course Preferences</legend>
                        <div class="formContainer">
                            <!--<label for="name" class="formLabel required">id</label>-->  
                            <div class="form">
                                <label for="firstProgram" class="formLabel required">1<sup>st</sup> preference</label>
                                <select name="firstProgram" id="firstProgram" class="form-control" onchange="secondProgramList()" required>
                                    <option selected>Select</option>

                                    <?php 
                                    $firstQuery = "SELECT * FROM `courses` ORDER BY `courses`.`course_name` ASC";
                                    $result=mysqli_query($conn,$firstQuery);
                                    if(mysqli_num_rows($result)>0)
                                    {
                                        while ($row=mysqli_fetch_assoc($result)) {
                                            ?><option value="<?php echo $row['course_id'];?>"><?php echo $row['course_name'];?></option><?php
                                        }


                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form">
                                <label for="secondProgram" class="formLabel required">2<sup>nd</sup> preference</label>
                                <select name="secondProgram" id="secondProgram" class="form-control" onchange="thirdProgramList()"required>
                                    <option>
                                        Select any program
                                    </option>
                                </select>
                            </div>
                            <div class="form">
                                <label for="thirdProgram" class="formLabel required">3<sup>rd</sup> preference</label>
                                <select name="thirdProgram" id="thirdProgram" class="form-control"required>
                                    <option>
                                        Select any program
                                    </option>
                                </select>
                            </div>
                        </div>
                    </fieldset>

                    <div class="space"></div>
                    <div class="text-center mb-5">
                        <input type="submit" name="submit" class="submitbtn" value="Submit and proceed to pay">
                    </div>
                </form>
            </div>
            <?php require "footer.php"; ?>
            <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
            <!-- Scripts for generating option for " locations " on the basis of the choice of the applicant-->
            <script type = "text/javascript">   
                function secondLocationList() {   
                    $(document).ready(function() {
                        var option=$("#firstLocation").val();
                        $.post('getPreference.php', {
                            locationOption: option
                        }, function(response) {
                            $("#secondLocation").html(response);
                        });
                    }); 
                }   
                function thirdLocationList() {   
                    $(document).ready(function() {
                        var option1=$("#firstLocation").val();
                        var option2=$("#secondLocation").val();
                        console.log(option1);
                        console.log(option2);
                        $.post('getPreference.php', {
                            locationOption1: option1,
                            locationOption2: option2
                        }, function(response) {
                            $("#thirdLocation").html(response);
                        });
                    }); 
                }   

            </script>  
            <!-- Scripts for generating option for "Colleges" on the basis of the choice of the applicant-->
            <script type="text/javascript">

                function secondList() {   
                    $(document).ready(function() {
                        var option=$("#first").val();
                        $.post('getPreference.php', {
                            collegeOption: option
                        }, function(response) {
                            $("#second").html(response);
                        });
                    }); 
                }   
                function thirdList() {   
                    $(document).ready(function() {
                        var option1=$("#first").val();
                        var option2=$("#second").val();
                        $.post('getPreference.php', {
                            collegeOption1: option1,
                            collegeOption2: option2
                        }, function(response) {
                            $("#third").html(response);
                        });
                    }); 
                }   


            </script> 
            <!-- Scripts for generating option for "Courses" on the basis of the choice of the applicant-->
            <script type="text/javascript">

                function secondProgramList() {   
                    $(document).ready(function() {
                        var option=$("#firstProgram").val();
                        $.post('getPreference.php', {
                            programOption: option
                        }, function(response) {
                            $("#secondProgram").html(response);
                        });
                    }); 
                }   
                function thirdProgramList() {   
                    $(document).ready(function() {
                        var option1=$("#firstProgram").val();
                        var option2=$("#secondProgram").val();
                        $.post('getPreference.php', {
                            programOption1: option1,
                            programOption2: option2
                        }, function(response) {
                            $("#thirdProgram").html(response);
                        });
                    }); 
                }   


            </script> 
        </body>
        </html>

        <?php
    }
    else if($check['status']=="almost")
    {
        header("Location:./razorpay");

    }
    else if($check['status']=="success")
    {
        header("Location:index.php");

    }
    else if($check['status']=="")
    {
        header("Location:applicationPAT.php");

    }
}
else
{
    header("Location: login.php");
}

?>