<?php
session_start();
require_once '../components/db_connect.php';
require_once "../components/navbar.php";
if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])  && !isset($_SESSION['superAdm'])) {
    header("Location: login.php" );
     
 }
  if (isset($_SESSION["user"])) {
    header("Location:../cradZoo/u_login.php");
   
 }  
 $id = $_SESSION['adm'];
 $sql = "SELECT * FROM user WHERE status != 'adm'";
 $result=mysqli_query($connect,$sql);
 
 /* $id = $_SESSION['adm'];
 $sql = "SELECT * FROM user WHERE status != 'adm'";
 */
 $result=mysqli_query($connect,$sql);
 $tbody = '';
 if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
    

    $tbody .= "<tr>
    <td><img class='img-thumbnail rounded-circle' src='../picture/" . $row['pictur'] . "' alt=" . $row['f_name'] . "></td>
    <td>" . $row['f_name'] . " " . $row['l_name'] . "</td>
    <td>" . $row['date_of_berth'] . "</td>
    <td>" . $row['eimail'] . "</td>
    <td><a href='l_update.php?id=" . $row['id'] . "'><button class='btn btn-primary btn-sm' type='button'>Edit</button></a>
    <a href='delete.php?id=" . $row['id'] . "'><button class='btn btn-danger btn-sm' type='button'>Delete</button></a></td>
   </tr>";
    }
}else{
    $tbody = "<tr><td colspan='5'><center>No Data Available </center></td></tr>"; 
} 


    

$connect->close();
?>


<!DOCTYPE html>
<html lang="en" >
<head>
<meta charset="UTF-8">
<meta name="viewport"   content="width=device-width, initial-scale=1.0">
<title>Adm-DashBoard</title>
<?php require_once '../components/boot.php' ?>
<style type="text/css" >       
.img-thumbnail{
 width: 70px !important;
  height: 70px !important;
}
td
{
 text-align: left;
 vertical-align: middle;
}
tr
{
 text-align: center;
}
.userImage{
width: 100px ;
height: auto;
}
</style>
</head>
<body >
<div class="container" >
<div class= "row">
<div  class="col-2">
<img class="userImage"  src="../picture/avataradm.jpg" alt= "Adm avatar" >
<p class="">Administrator </p>
<a class="btn-danger"  href="logout.php?logout">Sign Out </a><br>
<!-- <a  href="CodeReviews10/index.php">go to book </a> -->
</div >
<div  class="col-8 mt-2">
<p class='h2' >Users</p>
<table class='table table-striped'>
 <thead  class='table-success'>
     <tr>
         <th>Picture</th>
         <th>Name</th >
         <th>Date of birth</th>
         <th>Email</th>
         <th>Action</th >
     </tr>
 </thead>
 <tbody>
  <?=$tbody?>
  </tbody>
</table>
</div>
</div>
</div>
</body>
</html>