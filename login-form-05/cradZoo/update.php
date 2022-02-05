
<?php
require_once "../components/db_connect.php";
session_start();
 if(isset($_SESSION["user"])){
    header("location:u_login.php");
} 
/* if(isset($_SESSION["adm"])){
    header("location:index.php");
} */
if(isset($_GET["id"])){
    $id=$_GET["id"];
$sql="SELECT * FROM animals WHERE id=$id ";
$result=mysqli_query($connect,$sql);
$row= mysqli_fetch_assoc($result);

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
<!-- <style>
.container{
    background-image:url("../picture/bird.jpg") ;
    width: 100%;
    height: 900px;
}  -->
</style>
<body>
<div class="container">

<div class="row">

<form class="row g-3" action="../components/a_update.php" method="post" enctype="multipart/form-data">


<div class="col-12 ">
    <label class="form-label">NAME:</label>
    <input type="text" class="form-control" name="name"  placeholder="name" value="<?=$row['name']?>">
  </div>


  <div class="col-md-6">AGE:</label>
    <input type="text" class="form-control"  name="age" value="<?=$row["age"]?>">
  </div>

  <div class="col-md-6">
    <label class="form-label">PREIC:</label>
    <input  class="form-control" name="preic" value="<?=$row["preic"]?>">
  </div>

  
  <div class="col-12">
    <label  class="text-break">Short-Decription</label>
    <input type="text" class="form-control" name="schort_disc" placeholder="Decription" value="<?=$row["schort_disc"]?>">
  </div>

  <div class="col-12">
    <label  class="form-label">Picture:</label>
    <input type="file" class="form-control" name="picture"  placeholder="picture" value="<?=$row["pictur"]?>">
  </div>

  <div class=" text-center  p-3">
  
    
</select>
<select name="status" class="  col-3  fs-5 text-center" placeholder="status animals"  value="<?=$row["status"]?>">
    <option>seniors</option>
    <option>large</option>  
    <option>small</option> 
</select>

  
</div>
  </div>
  
   <div class="col-12 text-center m-2 ">
    <button class=" col-5 btn btn-success fs-4" type="submit">Update NEW</button>

    <input type="hidden" class="form-control" name="id"  value="<?=$id?>">
    
    <input type="hidden" class="form-control"  value="<?php echo $row["pictur"]?>" name="picture" >
    <!-- <a href="index.php" class='col-5 fs-4 btn btn-primary'type="button">Back To Home</a> 
  </div>  -->
</form>

</div>

</div>

</body>
</html>