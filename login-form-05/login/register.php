

<?php
        require_once "../components/db_connect.php";
        require_once "../components/boot.php";
        require_once "../components/file_upload.php";

      /*     session_start(); 
        if ( isset($_SESSION['user'])) {
        header("Location: h_login.php" ); 
        }   */ 
        if (isset($_SESSION[ 'adm' ])) {
        header("Location: dashboard.php"); 
        } 


    $error=false;
    $f_name=$l_name=$email=$date=$picture=$pass="";
    $f_nameError=$l_nameError=$emailError=$dateError=$passError=$passError= $pictureError="";
if(isset($_POST["btn-signup"])){
            $f_name=trim($_POST["f_name"]);
            $f_name=strip_tags($f_name);
            $f_name=htmlspecialchars($f_name);

            $l_name=trim($_POST["l_name"]);
            $l_name=strip_tags($l_name);
            $l_name=htmlspecialchars($l_name);
            
            $email=trim($_POST["email"]);
            $email=strip_tags($email);
            $email=htmlspecialchars($email);

            $date=trim($_POST["date"]);
            $date=strip_tags($date);
            $date=htmlspecialchars($date);

            $pass=trim($_POST["pass"]);
            $pass=strip_tags($pass);
            $pass=htmlspecialchars($pass);

            $uploadError="";
            $picture = file_upload($_FILES['picture']);

            ///firstName
            if(empty($f_name)){
                $error=true;
                $f_nameError ="please enter your first name";
            }elseif(strlen($f_name)<3){
                $error=true;
                $f_nameError =" your first name is short";
            }elseif(!preg_match("/^[a-zA-Z]+$/", $f_name)){
                $error=true;
                $f_nameError =" your first name not corect";
            }

            ///LASTNAME
            if(empty($l_name)){
                $error=true;
                $l_nameError ="please enter your last name";
            }elseif(strlen($l_name)<3){
                $error=true;
                $f_nameError =" your last name is short";
            }elseif(!preg_match("/^[a-zA-Z]+$/", $l_name)){
                $error=true;
                $l_nameError =" your lasst name not corect";
            }

            ///email
            if(empty($email)){
                $error=true;
                $l_nameError ="please enter your email";
            }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $error=true;
                $emailError =" your email not corect";
            }else{
                $sql="SELECT eimail FROM user WHERE eimail='$email'";
                $result=mysqli_query($connect,$sql);
                if(mysqli_num_rows($result)>0){
                    $error=true;
                    $emailError="your mail already used!";
                }
            }

            ///date
            if(empty($date)){
                $error=true;
                $dateError =" your date not corect";
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
               $query= "INSERT INTO `user`(f_name,l_name, eimail, date_of_berth, pictur, password) VALUES 
               ('$f_name', '$l_name', '$email','$date', '$picture->fileName', '$password')";


               $result=mysqli_query($connect,$query);

               if($result){
                   $errTyp="success";
                   $errMSG="welcome!!";
                   $uploadError = ($picture->error != 0) ? $picture->ErrorMessage : '';
                    $f_name="";
                    $l_name="";
                    $email="";
                    $date="";
                    $pass="";
               }else{
                $errTyp="danger";
                $errMSG="you have some thing wrong.";
                $uploadError = ($picture->error != 0) ? $picture->ErrorMessage : '';
               }
               $connect->close();
            }

  }




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

<link rel="stylesheet" href="../fonts/icomoon/style.css">

<link rel="stylesheet" href="../css/owl.carousel.min.css">

<!-- Bootstrap CSS -->
 <link rel="stylesheet" href="../css/bootstrap.min.css"> 

<!-- Style -->
<link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>
<body>
    


<!-- <div class="d-ld-flex half"> 
     <div class="bg" style="background-image: url('images/bg_1.jpg');"></div> 
    <div class="contents"> -->

      <div class="container ">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-12">
            <div class=" mx-auto"><!-- form-block -->
              <div class="text-center "><!-- mb-5 -->
                <h3 class="text-uppercase">Register<strong>Animal care</strong></h3>
              </div>
              <form class="w-75" method="post"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off"  enctype="multipart/form-data">

              <?php
           if (isset($errMSG)) {
           ?>
           <div class="alert alert-<?php echo $errTyp ?>"  >
                        <p><?php echo $errMSG; ?></p>
                        <p><?php echo $uploadError; ?></ p>
           </div>

           <?php
           }
           ?>
                <div class="form-group first">
                  <label for="username">FIRST NAME</label>
                  <input type="text" class="form-control"  placeholder="your Name"
                   name="f_name" value="<?php echo $f_name?>">
                  <span class="text-danger" > <?php echo $f_nameError; ?> </span>
                </div>
                <div class="form-group first">
                  <label for="username">LASR NAME</label>
                  <input type="text" class="form-control" placeholder=" Last Name"
                   name="l_name" value="<?php echo $l_name?>">
                   <span class="text-danger" > <?php echo $l_nameError; ?> </span>
                </div>
                <div class="form-group first">
                  <label for="username">E-MAIL</label>
                  <input type="email" class="form-control" placeholder="your-email@gmail.com" 
                  name="email" value="<?php echo $email?>">
                  <span class="text-danger" > <?php echo $emailError; ?> </span>
                </div>
               
                <div class="form-group last mb-3">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" placeholder="Your Password" 
                  name="pass" value="<?php echo $pass?>">
                  <span class="text-danger" > <?php echo $passError; ?> </span>
                </div>
                
                <div class="form-group first">
                  <label for="username">date_of_birth</label>
                  <input type="date" class="form-control" placeholder="date_of_birth" 
                  name="date" value="<?php echo $date?>">
                  <span class="text-danger" > <?php echo $dateError; ?> </span>
                </div>
                <div class="form-group first">
                  <label for="username">picture</label>
                  <input type="file" class="form-control"  placeholder="no foto"
                  name= "picture">
                  <span class="text-danger" > <?php echo $pictureError; ?> </span>
                </div>
                
                <div class="d-sm-flex mb-5 align-items-center">
                  <label class="control control--checkbox mb-3 mb-sm-0"><span class="caption">Remember me</span>
                    <input type="checkbox" checked="checked"/>
                    <div class="control__indicator"></div>
                  </label>
                  <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span> 
                </div>

                <button type="submit" name = "btn-signup"  class="btn btn-block py-2 btn-primary">Register</button>
                <a class="btn-danger"  href="login.php" class="forgot-pass">login</a>
               
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>



























</body>
</html>