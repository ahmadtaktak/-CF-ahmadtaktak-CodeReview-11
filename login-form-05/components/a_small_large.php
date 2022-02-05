<?php
/* require_once "components/boot.php";
require_once "components/navbar.php"; */
session_start();
require_once "../components/db_connect.php";

$red="red_Adm";
  if(isset($_SESSION["user"])){
  $red= "red_User";
}  
 

$search=$_GET["search"];

$sql="SELECT * from animals WHERE status !='seniors'";


$result= mysqli_query($connect,$sql);

if(mysqli_num_rows($result)> 0){
while($row=mysqli_fetch_assoc($result)){

    echo "<div class=' shadow p-3 mb-5 bg-body rounded m-5' style='width: 20rem;'>
    <img src='../picture/{$row["pictur"]}' class='card-img-top' alt='...'height='200'>
    <div class='card-body'>
      <h5 class='card-title text-center'> Name :{$row ["name"]}</h5>
      <h5 class='card-title text-center'>Age : {$row["age"]}</h5>
      <h5 class='card-title text-center'>Preic : {$row["preic"]}€</h5>
     <div class='text-center'>
      <a href='$red.php?id={$row["id"]}' class='btn btn-primary'>Red Mor</a></div>
      
    </div>
  </div>";
}
}else{
    echo "you dont have any thing...!";
}
?> 

