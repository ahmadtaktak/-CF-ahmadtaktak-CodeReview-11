
<?php

 session_start();
if(isset($_SESSION["user"])){
    header("location:u_login.php");
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
    background-image:url("pictures/book3.jpg") ;
}
.bakgraund{ background-image: url("https://cdn.pixabay.com/photo/2016/03/26/22/21/books-1281581_960_720.jpg");
   height: 400px;
   width: 100%;}

</style> -->
<body>
<div class="bakgraund"></div>
<div class="container">
<div class="row">
<form class="row g-4" action="../components/a_create.php" method="post" enctype="multipart/form-data">
<div class="col-6 ">
    <label class="form-label">NAME:</label>
    <input type="text" class="form-control" name="name"  placeholder="name">
  </div>
  <div class="col-md-6 py-2">AGE:</label>
    <input type="text" class="form-control" placeholder="age" name="age" >
  </div>

  <div class="col-md-6">
    <label class="form-label">PREIC:</label>
    <input  class="form-control" placeholder="preic" name="preic" >
  </div>

  
  <div class="col-6">
    <label  class="text-break py-1">Short-Decription</label>
    <input type="text" class="form-control" name="schort_disc" placeholder="Decription">
  </div>

  <div class="col-12 ">
    <label  class="form-label">Picture:</label>
    <input type="file" class="form-control" name="pictur"  placeholder="picture">
  </div>

  <div class=" text-center  p-3">
  
    
</select>
<select name="status" class="  col-5  fs-5 text-center" placeholder="status animals"  >   
    <option>seniors</option>
    <option>large</option>  
    <option>small</option> 
</select>

  
</div>
  </div>
  
   <div class="col-12 text-center py-4 ">
    <button class="  col-5 btn btn-success fs-4" type="submit">CREATE NEW</button>
    
    <!-- <a href="index.php" class='col-5 fs-4 btn btn-primary'type="button">Back To Home</a> 
  </div>  -->
</form>

</div>

</div>

</body>
</html>