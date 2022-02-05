<?php
      require_once "../components/db_connect.php";
      require_once "../components/navbar.php";
  
     if(!isset($_SESSION)) 
      { 
          session_start(); 
      }  
      /* if(isset($_SESSION["adm"])){
         header("location:../login/dashboard.php");
     }  */ 
     if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
        header("Location:../login/login.php" );
         exit;
     } 
      

     $btnClass="d-none";

    if(isset($_SESSION["adm"])){
      $btnClass ="";
      $btnClass1="d-none";
    } 

     $connect->close();

         /*  require_once "./components/boot.php";
        if(isset($_SESSION["adm"])){
            header("location:daschboard.php");
        }
        if(isset($_SESSION["user"]) &&!isset($_SESSION["adm"])){
            header("location:login.php");
        }*/

       
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
   <?php require_once "../components/boot.php";?>
  
</head>
<body>
 
<div class ="container  <?= $btnClass1?>">
 
 



  <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="3" aria-label="Slide 4"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="4" aria-label="Slide 5"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="10000">
      <img src="https://cdn.pixabay.com/photo/2016/02/10/16/37/cat-1192026_960_720.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <!-- <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p> -->
      </div>
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="https://cdn.pixabay.com/photo/2017/02/07/16/47/kingfisher-2046453__340.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <!-- <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide.</p> -->
      </div>
    </div>
    <div class="carousel-item">
      <img src="https://cdn.pixabay.com/photo/2021/10/19/10/56/cat-6723256__340.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <!-- <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p> -->
      </div>
    </div>
    <div class="carousel-item">
      <img src="https://media.istockphoto.com/photos/spotted-rabbit-in-sunlight-at-the-green-grass-on-the-garden-picture-id1271893635?k=20&m=1271893635&s=612x612&w=0&h=Jf3Lv4OEOmHaR8f8Ap87ibP5YOvIijWjS8l7IIJ0h0w=" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <!-- <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p> -->
      </div>
    </div>
    <div class="carousel-item">
      <img src="https://cdn.pixabay.com/photo/2017/09/25/13/12/cocker-spaniel-2785074__340.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <!-- <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p> -->
      </div>
    </div>
  </div>

  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</div> 
<a class="btn-danger"  href="../login/logout.php?logout">Sign Out </a><br>
<div class="container">
       <div class="row " id="content"></div>

       </div>

       <script>
function loadDoc() {
let xhttp = new XMLHttpRequest();
xhttp.onload = function() {
    if (this.status == 200 ) {
        document.getElementById("content").innerHTML =this.responseText;
       
    }
};
var name=document.getElementById("search").value;
xhttp.open("GET", '../components/a_search.php?search='+name , true); //(method, URL, async)
xhttp.send();
}

loadDoc();

document.getElementById("search").addEventListener("keyup",loadDoc);
</script>     
</body>
</html>
