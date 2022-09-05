<?php
session_start();
include("connection.php");

if (isset($_POST['submit'])) {

  $uname = $_POST['uname'];
  $pass = $_POST['pass'];


  $query = "SELECT * FROM logintable where uname = '$uname' && pass = '$pass'";
  $data = mysqli_query($conn, $query);


  $total = mysqli_num_rows($data);

  // echo $total;

  if ($total == 1) {
    // echo " Login ok";

    $_SESSION['user_name'] = $uname;

    header('location:banner.php');



    // <!-- <meta http-equiv = "refresh" content = "0; url = http://localhost/testlogin/admin/display.php"/> -->

  } else {
    echo "Login Failed";
  }
}





?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link href="img/logo.png" rel="icon" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="./style.css">
  <title>Log In </title>
</head>

<body>
  <div class="login-background"></div>
  <div class="container">
    <div class="login-box">
      <div class="row">
        <div class="col-md-6">
        <div class="log_in">
          <div class="login_new">
          <form action="#" method="POST" autocomplete="off">
            <h3>Hello! let's get started</h3>
            <!-- <h5 class="text-center">Log in to continue..</h5> -->
            <input type="text" name="uname" placeholder="User Name">
            <input type="password" name="pass" placeholder="Password">
            <button type="submit" name="submit"> Login</button>
          </form>
          </div>
        </div>
        </div>
        <div class="col-md-6">
          <div class="log_in">
            <a href=""><img src="./assets/img/login.jpg" alt="login image" style="width:189% ;"></a>
          </div>
        </div>
      </div>
      <div>

      </div>
    </div>
  </div>
  

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>