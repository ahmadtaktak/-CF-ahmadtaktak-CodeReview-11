<?php
require_once "../components/db_connect.php";


 session_start();
 if(isset($_SESSION["user"])){
  header("location:red_User.php");
} 


if(isset($_GET["id"])){
  $id=$_GET["id"];
$sql="SELECT * FROM animals WHERE id=$id";
$result=mysqli_query($connect,$sql);
$layout = mysqli_fetch_assoc($result);
$print="";



$print.="<div class='content card shadow p-3 mb-5 bg-body rounded' style='width: 100%rem height:300rem;'>

<div class='text-center';>
<img  src='../picture/{$layout["pictur"]}' style=' width: 20rem ' ; card-img-top'   alt='...'>
</div>
<div class='text-center card-body '>
<h1 class=' card-title text-center fst-italic fs-1'>name :{$layout["name"]}</h1>
  <p class='card-title text-center'>age : {$layout["age"]}</p>
  <p class='card-title text-center'>preic : {$layout["preic"]}€</p>
  <p class='card-title text-center'>Status : {$layout["status"]}</p>
  <p class='card-text fst-italic '>{$layout["schort_disc"]}</p><br>
  
  
  <div class='text-center'>
  <a href='delete.php?id={$layout["id"]}' class='btn btn-danger fs-3 col-3 m-2'>Delete</a>
 
  <a href='update.php?id={$layout["id"]}' class=' btn btn-warning fs-3 col-3 m-2 '>Update</a>
  
  </div>
</div>
</div>";
}

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once "../components/boot.php"?> 
    <?php require_once "../components/navbar.php"?> 
    <title>Document</title>
</head>

<body>
<div class="bakgraund"></div>
<div class="container">


        <div class="row">
 <?php echo $print?>;
 
        </div>
       
</div>
</body>
</html>