<?php 
require_once "db_connect.php";

if  ($_POST) {
   $id =$_POST['id'];
   $picture = $_POST['picture'];
   ($picture =="cat1.jpg")?: unlink("../picture/$picture" );

   $sql = "DELETE FROM animals WHERE id = {$id}";
   if (mysqli_query($connect,$sql)) {
       $class = "success";
       $message = "Successfully Deleted!";
   } else {
       $class = "danger";
       $message = "The entry was not deleted due to: <br>" . $conn->error;
   }
   $connect->close();
} else {
   header("location: ../error.php");
}
?>


<!DOCTYPE html>
<html lang= "en">
   <head>
       <meta  charset="UTF-8">
       <title>Delete</title>
       <?php require_once 'boot.php' ?> 
   </head>
   <body>
       <div  class="container">
           <div class="mt-3 mb-3" >
               <h1>Delete request response</h1>
           </div>
            <div class="alert alert-<?=$class;?>" role="alert">
               <p><?=$message;?></p >
               <a href ='../cradZoo/u_login.php'><button class= "btn btn-success" type='button'> Home</button></a>
            </div>
       </div >
   </body>
</html>