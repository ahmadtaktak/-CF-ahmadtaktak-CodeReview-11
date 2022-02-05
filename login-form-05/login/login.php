<?php
     require_once "../components/db_connect.php";
     
        require_once "../components/file_upload.php"; 
   
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        if (isset($_SESSION['user'])) {
           header("Location:../cradZoo/u_login.php"); 
        }    
         if (isset($_SESSION[ 'adm' ])) {
           header("Location:dashboard.php"); 
        } 
      
       

        $error=false;
        $email=$pass="";
        $emailError=$passError="";

      if(isset($_POST["btn-login"])){
                $email=trim($_POST["email"]);
                $email=strip_tags($email);
                $email=htmlspecialchars($email);

                $pass=trim($_POST["pass"]);
                $pass=strip_tags($pass);
                $pass=htmlspecialchars($pass);

            if(empty($email)){
              $error=true;
              $l_nameError ="please enter your email";
          }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
              $error=true;
              $emailError =" your email not corect";

          }

          if(empty($pass)){
            $error=true;
            $l_nameError ="please enter your pass";
          }elseif(strlen($pass)<5){
            $error=true;
            $passError =" your pass not corect!";
          }
          if(!$error){
                $password=hash("sha256",$pass);
                $sql ="SELECT * FROM user WHERE eimail='$email'";
                $result= mysqli_query($connect,$sql);
                $row=mysqli_fetch_assoc($result);
                $count=mysqli_num_rows($result);

              if($count==1 &&$row["password"]==$password){
                if($row["status"]=="adm"){
                  $_SESSION["adm"]=$row["id"];
                  header("Location: dashboard.php");
                }
               elseif($row["status"]=="superAdm"){
                  $_SESSION["superAdm"]=$row["id"];
                  header("Location: dashboard.php");
                }
                
                else{
                  $_SESSION["user"]=$row["id"];
                  header("Location:../cradZoo/u_login.php");
                }
              }else{
                $errMSG="wrong in your acaunt, try agen..";
              }

         }

         $connect->close();
        }
        
         
?>





<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../fonts/icomoon/style.css">

    <link rel="stylesheet" href="../css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="../css/style.css">

    <title>Login #5</title>
    <?php require_once "../components/boot.php";?>
  </head>
  
  <body>
  

  <div class="d-sm-flex half">
    <div class="bg" style="background-image: url('../picture/cat2.jpg');"></div>
    <div class="contents">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-12">
            <div class="form-block mx-auto">
              <div class="text-center mb-5">
                <h3 class="text-uppercase">Welcome in <strong>Animal care </strong>Center</h3>
              </div>
              <form  class="" method="post"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off"  enctype="multipart/form-data">

                    <?php
                if (isset($errMSG)) {
                    echo $errMSG;
                }
                ?>

                <div class="form-group first">
                  <label for="username">Username</label>
                  <input type="email" class="form-control " autocomplete="off" placeholder="your-email@gmail.com" 
                  name="email" value="<?php echo $email; ?>">
                  <span class="text-danger" > <?php echo $emailError; ?> </span>
                </div>
                <div class="form-group last mb-3">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" placeholder="Your Password" name="pass">
                  <span class="text-danger" > <?php echo $passError; ?> </span>
                </div>
                
                <div class="d-sm-flex mb-5 align-items-center">
                  <label class="control control--checkbox mb-3 mb-sm-0"><span class="caption">Remember me</span>
                    <input type="checkbox" checked="checked"/>
                    <div class="control__indicator"></div>
                  </label>
                  <span class="ml-auto"><a href="register.php" class="forgot-pass">Forgot Password</a></span> 
                </div>

                <button type="submit" name="btn-login" value="Log In" class="btn btn-block py-2 btn-primary"> Log In</button>

                <span class="text-center my-3 d-block">or</span>
                
                
                <div class="">
                <a href="https://www.facebook.com/login.php" class="btn btn-block py-2 btn-facebook">
                  <span class="icon-facebook mr-3"></span> Login with facebook
                </a>
                <a href="https://accounts.google.com/ServiceLogin/signinchooser?flowName=GlifWebSignIn&flowEntry=ServiceLogin" class="btn btn-block py-2 btn-google"><span class="icon-google mr-3"></span> Login with Google</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    
  </div>
    
    

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>