
<?php
  require_once "db_connect.php";
   $btnClass="d-none";
  
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    
    if(isset($_SESSION["user"])){
      $id=$_SESSION["user"];
    }
   if(isset($_SESSION["adm"])){
     $btnClass ="";
     $btnClass1="d-none";
   } 

  
   ?> 
  <?php require_once "boot.php"?> 
<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
  <div class="container-fluid">
    <a class="navbar-brand " href="#">Adopt</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item <?=$btnClass1;?>">
          <a class="nav-link active" aria-current="page" href="../cradZoo/u_login.php">Home</a>
        </li>
        <li class='nav-item <?=$btnClass;?>'>
     <a class='nav-link active ' aria-current='page' href='create.php'>Create</a>
   </li>

   <li class="nav-item <?=$btnClass1;?>">
        <a class="nav-link"  href="../login/l_update.php?id=<?= $id;?>">Edit Pro</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            age
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="../cradZoo/u_login.php">all</a></li>
            <li><a class="dropdown-item" href="../cradZoo/seniors.php">Seniors</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="../cradZoo/small_large.php">Small_large</a></li>
          </ul>
          <li class="nav-item dropdown <?=$btnClass;?>">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
         seite
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="../login/dashboard.php">Users</a></li>
            <li><a class="dropdown-item" href="../cradZoo/u_login.php">animals</a></li>
            <li><hr class="dropdown-divider"></li>
           
          </ul>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" id="search" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
