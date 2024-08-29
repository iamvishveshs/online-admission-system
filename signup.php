<!DOCTYPE html>
<html>
<head>
    <title>
        Register now - OAS
    </title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="form.css">
    <title>Document</title>
</head>
<body>
    <?php require "navbar.php"; ?>
    <?php 
    if (isset($_GET['error'])) {

        ?>
        <div class="alert">
          <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
          Account with <span style="color:red;font-weight:bold;"><?php echo $_GET['email'];?></span> account already Exists.<br>
          Please <a href="./login.php" class="styled-link-white">login</a> to continue.
      </div>
      <?php 
  }
  ?>
    <div class="formContainer">

        <form method="post" action="user-register.php" class="Form">

            <h1 class="form-heading text-white">Sign Up</h1>
            <label for="name" class="formLabel label1">Name</label>
            <input type="text" name="name" id="name" required>
            <label for="email" class="formLabel">Email</label>
            <input type="email" name="email" id="email" required>
            <label for="pass" class="formLabel">Password</label>
            <input type="password" name="pass" id="pass" required>
            <p class="account-link">Already have an account <a href="login.php" class="styled-link">Login Now</a></p>
            <input type="submit" name="signup" value="Create Account">
        </form>
    </div>
</body>
</html>