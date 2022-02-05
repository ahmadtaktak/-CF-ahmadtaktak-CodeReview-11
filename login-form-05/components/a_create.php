<?php
require_once "db_connect.php";
require_once "file_upload.php";
if($_POST){
    $name=$_POST['name'];
    $age=$_POST["age"];
    $preic=$_POST["preic"];
    $status=$_POST["status"];
    $short_description=$_POST["schort_disc"];
    $pictur=file_upload($_FILES["pictur"]);
    $erroeMag="";
  $sql="INSERT INTO animals( name, age, preic, status,schort_disc, pictur) VALUES ('$name','$age','$preic','$status','$short_description','$pictur->fileName')";
    


if($connect->query($sql)===true){
    $class = "success";
    $message = "The entry below was successfully created <br>";
    $uploadError = ($pictur->error !=0)? $pictur->ErrorMessage :'';
} else {
    $class = "danger";
    $message = "Error while creating record. Try again: <br>" . $connect->error;
    $uploadError = ($picture->error !=0)? $pictur->ErrorMessage :'';
}
$connect->close();
} else {
header("location: ../error.php");
}  




?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Update</title>
        <?php require_once 'boot.php'?>
    </head>
    <body>
        <div class="container">
            <div class="mt-3 mb-3">
                <h1>Create request response</h1>
            </div>
            <div class="alert alert-<?=$class;?>" role="alert">
                <p><?php echo ($message) ?? ''; ?></p>
                <p><?php echo ($uploadError) ?? ''; ?></p>
                 <a href='../login/dashboard.php'><button class="btn btn-primary" type='button'>Home</button></a> 
            </div>
        </div>
    </body>
</html>