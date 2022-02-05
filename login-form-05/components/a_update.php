<?php
require_once "db_connect.php";
require_once "file_upload.php";
if($_POST){
    $name=$_POST['name'];
    $age=$_POST["age"];
    $preic=$_POST["preic"];
    $status=$_POST["status"];
    $short_description=$_POST["schort_disc"];
    $picture=file_upload($_FILES["picture"]);
 //$pictur=$picture->fileName;
    $id=$_POST["id"];
    $uploadError = '';
    $erroeMag="";
    if($picture->error===0){
        ($_POST["picture"]=="cat1.jpg")?: unlink("../pictures/$_POST[picture]");
  $sql="UPDATE animals SET name='$name' ,age='$age', preic='$preic' ,status='$status', schort_disc='$short_description', pictur = '$picture->fileName' WHERE id={$id}";
}else{
    $sql="UPDATE animals SET name='$name' ,age='$age', preic='$preic' ,status='$status', schort_disc='$short_description' WHERE id={$id}";
}

if(mysqli_query($connect,$sql)===TRUE){
    $class = "success";
    $message = "The entry below was successfully created <br>";
       
    $uploadError = ($picture->error !=0)? $picture->ErrorMessage :'';
}else {
    $class = "danger";
    $message = "Error while creating record. Try again: <br>" . $connect->error;
    $uploadError = ($picture->error !=0)? $picture->ErrorMessage :'';
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
<!--                 <a href='../index.php'><button class="btn btn-primary" type='button'>Home</button></a>
 -->            </div>
        </div>
    </body>
</html>