<!--Server Side Scripting Language to inject login code-->
<?php
    session_start();
    include('vendor/inc/config.php');//get configuration file
    if(isset($_POST['admin_login']))
    {
      $a_email=$_POST['a_email'];
      $a_pwd=($_POST['a_pwd']);//
      $stmt=$mysqli->prepare("SELECT a_email, a_pwd, a_id FROM tms_admin WHERE a_email=? and a_pwd=? ");//sql to log in user
      $stmt->bind_param('ss',$a_email,$a_pwd);//bind fetched parameters
      $stmt->execute();//execute bind
      $stmt -> bind_result($a_email,$a_pwd,$a_id);//bind result
      $rs=$stmt->fetch();
      $_SESSION['a_id']=$a_id;//assaign session to admin id
      //$uip=$_SERVER['REMOTE_ADDR'];
      //$ldate=date('d/m/Y h:i:s', time());
      if($rs)
      {//if its sucessfull
        header("location:admin-dashboard.php");
      }

      else
      {
      #echo "<script>alert('Access Denied Please Check Your Credentials');</script>";
      $error = "Access Denied Please Check Your Credentials";
      }
  }
?>
<!--End Server side-->
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Vehicle Booking System Transport Saccos, Matatu Industry">
  <meta name="author" content="MartDevelopers">

  <title>Vehicle Booking System - Admin Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
   <style>
  * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "poppins", sans-serif;
      
      }
      body {
        display: flex;
        justify-content: center;
        align-items: center;
        background: url("http://localhost/portfolio/IMG-20250226-WA0011.jpg") no-repeat;
        min-height: 100vh;
        background-size: cover;
        background-position: center;
      }

      .wrapper{
                width: 420px;
                background: transparent;
                color: white;
                border-radius: 10px;
                padding: 30px 40px;
                border: 2px solid rgb(255, 255, 255, 0.3);
                backdrop-filter: blur(35px);
                box-shadow: 0 0 10px rgb(0, 0, 0, 0.2);
}
.wrapper h1{
  text-align: center;
  font-size: 36px;
}
.wrapper .input-box{
  position: relative;
  width: 100%;
  height: 50px;
  margin: 30px;
}
.input-box input{
  width: 100%;
  height: 100%;
  background: transparent;
  border: none;
  outline: none;
  border: 2px solid rgb(255, 255, 255, 0.2);
  border-radius: 50px;
  font-size: 16px;
  color: white;
  padding: 20px 45px 20px 20px;
}
/* Login Button */
#loginButton { 
    display:inline-block;  
    position:relative;
    z-index:30;
    cursor:pointer;
}
</style>


</head>

<body class="bg-dark">
  <!--Trigger Sweet Alert-->
  <?php if(isset($error)) {?>
  <!--This code for injecting an alert-->
      <script>
            setTimeout(function () 
            { 
              swal("Failed!","<?php echo $error;?>!","error");
            },
              100);
      </script>
					
  <?php } ?>

  <div class="wrapper">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">

        <form method="POST">
          <div class="input-box">
            <div class="form-label-group">
              <input type="email" id="inputEmail" name="a_email" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
              <label for="inputEmail">Email address</label>
            </div>
          </div>
          <div class="input-box">
            <div class="form-label-group">
              <input type="password" id="inputPassword" name ="a_pwd" class="form-control" placeholder="Password" required="required">
              <label for="inputPassword">Password</label>
            </div>
          </div>
          <div class="remember-forgot">
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me">
                Remember Password 
              </label>
            </div>
          </div>
          <input type="submit"  class="btn btn-success btn-block" name="admin_login" value="Login">
        </form>

        <div class="text-center">
        <a class="d-block small mt-3" href="../index.php">Home</a>
          <a class="d-block small" href="admin-reset-pwd.php">Forgot Password?</a>
        </div> 

      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <!--Sweet alerts js-->
  <script src="vendor/js/swal.js"></script>


</body>

</html>
