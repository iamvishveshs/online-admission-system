<?php
session_start();
require("./db.php");
if(isset($_SESSION['id']))
{
    $id=$_SESSION['id'];
            $query="SELECT * FROM `application_status` WHERE `user_id`='$id'";
            $result=mysqli_query($conn,$query);
            $row=mysqli_fetch_assoc($result);
    if($row['status']=="almost")
    {
    /* Getting results from `applicant_personal_details` table */
    $personalQuery = "SELECT * FROM `applicant_personal_details` WHERE `applicant_id`='$id'";
    $personalResult=mysqli_query($conn,$personalQuery);
    $personal=mysqli_fetch_assoc($personalResult);
    /* Getting results from `user` table */
    $userQuery = "SELECT * FROM `user` WHERE `id`='$id'";
    $userResult=mysqli_query($conn,$userQuery);
    $user=mysqli_fetch_assoc($userResult);

    
    ?>  
    <html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Checkout</title>


        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" >
        <!-- font awesome icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" />

        <!-- Custom CSS file -->
        <link rel="stylesheet" href="checkout.css">
    </head>
    <body>
        <div class="container container1 h-100 d-flex align-items-center justify-content-center">
        <div class="col-lg-6 px-4 pb-4 d-grid place-items-center">
                <h4 class="text-center text-info p-2">Complete your Application for PAT</h4>
                <div class="jumbotron p-3 mb-2 text-center">
                    <p>Below are the details for submitting your fees</p>
                </div>
                <form action="pay.php" method="post">
                    <input type="text" id="id" name="id" value="<?php echo $user['id'];  ?>" hidden>
                    <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                    <input type="text" id="fname" name="name" placeholder="your name" value="<?php echo $user['name'];  ?>" readonly>

                    <label for="mobile"><i class="fa fa-envelope"></i> mobile</label>
                    <input type="text" id="mobile" name="mobile" placeholder="your mobile" value="<?php echo $personal['contact_no'];  ?>" readonly>

                    <label for="email"><i class="fa fa-envelope"></i> Email</label>
                    <input type="text" id="email" name="email" placeholder="your Email" value="<?php echo $user['email'];  ?>" readonly>

                    <div class="row">

                        <div class="col-50">
                            <label for="totalAmounnt">Application Fees (in Rupees)</label>
                            <input type="text" id="" name="fees" placeholder="" value="<?php 
                            if($personal['category']=="general" || $personal['category']=="obc")
                            {
                                echo "250";
                            }
                                else if($personal['category']=="sc" || $personal['category']=="st")
                            {
                                echo "100";
                            }
                        ?>" readonly/>
                        </div>

                    </div>      <button class="btn btn-primary mt-3" type="submit">Proceed to Pay</button>
                </div>



            </form>
        </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!-- Owl Carousel Js file -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha256-pTxD+DSzIwmwhOqTFN+DB+nHjO4iAsbgfyFq5K5bcE0=" crossorigin="anonymous"></script>

    <!--  isotope plugin cdn  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js" integrity="sha256-CBrpuqrMhXwcLLUd5tvQ4euBHCdh7wGlDfNz8vbu/iI=" crossorigin="anonymous"></script>

</body>
</html>
<?php
}
else if($row['status']=="success")
                {
                    header("Location:../index.php");

                }
                else if($row['status']=="partial")
                {
                    header("Location:../testPreferences.php");
                }
                else if($row['status']=="")
    {
        header("Location:../applicationPAT.php");
    }
}
else
{
    header("Location: ../login.php");
}

?>