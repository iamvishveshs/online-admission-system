<!DOCTYPE html>
<html>
<head>
    <title>
        Login - OAS
    </title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="form.css">
    
</head>
<body>
    <?php require "navbar.php"; ?>
    <?php 
    if (isset($_GET['success'])) {

        ?>
        <div class="alert">
          <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
          Your ccount has been Created<br>
          Email: <?php echo $_GET['email'];?><br>
          Password: <?php echo $_GET['pass'];?>
      </div>
      <?php 
  }
  ?>
  <?php 
    if (isset($_GET['error'])) {

        ?>
        <div class="alert-danger">
          <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
          <?php echo $_GET['error'];?>
      </div>
      <?php 
  }
  ?>
  
  <div class="formContainer">
    <form method="post" action="user-login.php" class="Form">
        <h1 class="form-heading text-white">Login</h1>
        <label for="email" class="formLabel">Email</label>
        <input type="email" name="email" id="email" required>
        <label for="pass" class="formLabel">Password</label>
        <input type="password" name="pass" id="pass" required>
        <p class="account-link">Don't have an account <a href="signup.php" class="styled-link">Create Now</a></p>

        <input type="submit" name="login" value="Login">
    </form>
</div>

</body>
</html>