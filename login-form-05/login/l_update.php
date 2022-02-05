<?php
session_start();
require_once '../components/db_connect.php';
require_once '../components/file_upload.php';
if( !isset($_SESSION['adm']) && !isset($_SESSION['user' ]) && !isset($_SESSION['superAdmn' ]) ) {
    header("Location:login.php");
    exit;
   }
 /*   if( isset($_SESSION['adm'])){
    header("Location:dashboard.php");
   } */
 
  
$backBtn = '';
if (isset($_SESSION["user"])){
   $backBtn = "../cradZoo/u_login.php";    
}
 if(isset($_SESSION["adm"])){
   $backBtn = "dashboard.php";    
}  

if (isset($_GET[ 'id'])) {
   $id = $_GET['id'];
   $sql = "SELECT * FROM user WHERE id = {$id}";
   $result = $connect->query($sql);
   if ($result->num_rows == 1) {
       $data = $result->fetch_assoc();
       $f_name = $data['f_name'];
       $l_name = $data['l_name'];
       $email = $data['eimail'];
       $date_birth = $data['date_of_berth'];
       $picture = $data['pictur'];
   }  
}

$class = 'd-none';
if (isset($_POST["submit" ])) {
   $f_name = $_POST['f_name'];
   $l_name = $_POST['l_name'];
   $email = $_POST[ 'eimail'];
   $date_of_birth = $_POST['date_of_berth'];
   $id = $_POST['id'];
   $uploadError = '';    
   $pictureArray = file_upload($_FILES['pictur']); 
   $picture = $pictureArray->fileName;
   if ($pictureArray->error === 0) {      
       ($_POST[ "picture"] == "avatar.jpg") ?: unlink("../picture/{$_POST["picture"]}");
       $sql = "UPDATE user SET f_name = '$f_name', l_name = '$l_name', eimail = '$email', date_of_berth = '$date_of_birth', pictur = '$pictureArray->fileName' WHERE id = {$id}";
   } else {
       $sql = "UPDATE user SET f_name = '$f_name', f_name = '$l_name', eimail = '$email', date_of_berth = '$date_of_birth' WHERE id = {$id}";
   }
    if ($connect->query($sql) === true) {    
       $class = "alert alert-success";
       $message = "The record was successfully updated";
       $uploadError = ($pictureArray->error != 0) ? $pictureArray->ErrorMessage : '';
      /*  header("refresh:3;url=l_update.php?id={$id}"); */
   } else {
       $class = "alert alert-danger";
       $message = "Error while updating record : <br>" . $connect->error;
       $uploadError = ($pictureArray->error != 0) ? $pictureArray->ErrorMessage : '';
      /*  header("refresh:3;url=l_update.php?id={$id}"); */
   }  
}
$connect->close();
?>
<!DOCTYPE html>
<html lang="en" >
<head>
   <meta charset="UTF-8">
    <meta name="viewport"   content="width=device-width, initial-scale=1.0">
  <title>Edit User</title>
  <?php require_once '../components/boot.php'?>
  <style type= "text/css">
      fieldset {
           margin: auto;
           margin-top: 100px ;
           width: 60% ;
       }
       .img-thumbnail{
           width: 70px !important;
           height: 70px !important;
       }
     
/* .container{
    background-image:url("../picture/bird.jpg") ;
   
} */
  </style>
</head>
<body>
<div class ="container">
   <div class="<?php echo $class; ?>"  role="alert">
       <p><?php echo ($message) ?? ''; ?></p>
        <p><?php echo ($uploadError) ?? ''; ?></p>       
    </div>
   
       <h2>Update</h2>       
       <img class='img-thumbnail rounded-circle'  src='../picture/<?php echo $data['pictur'] ?>' alt="<?= $f_name ?>">
       <form  method="post" enctype="multipart/form-data" >
           <table  class="table">
               <tr>
                   <th>First Name</th >
                   <td><input class="form-control"  type="text"  name ="f_name" placeholder = "FirstName"  value="<?php echo $f_name ?>"   /></td>
               </tr>
               <tr>
                   <th>Last Name</th>
                   <td ><input class= "form-control" type= "text"  name="l_name"  placeholder="LastName" value ="<?php echo $l_name ?>" /></td>
               </tr>
               <tr>
                   <th>Email</th>
                   <td><input class ="form-control" type ="email" name ="eimail" placeholder = "Email" value = "<?php echo $email ?>" /></td>
               </tr>
               <tr>
                   <th>Date of birth</th>
                    <td ><input class= "form-control" type ="date"  name="date_of_berth"  placeholder= "Date of birth"   value = "<?php echo $date_berth ?>"  /></td >
               </tr>
               <tr>
                   <th>Picture</th>
                    <td><input  class= "form-control"  type ="file"   name = "pictur"  value = "<?php echo $picture  ?>" /></td >
                </tr >
                <tr >
                    <input   type = "hidden"   name = "id"   value = "<?php echo $data['id'] ?>"  />
                    <input   type = "hidden"   name = "picture"   value = "<?php echo $picture ?>"  />
                    <td ><button   name = "submit"   class = "btn btn-success"   type = "submit" > Save Changes </button><td>
                    <td ><a   href = "<?php echo $backBtn?>" ><button   class = "btn btn-warning"   type = "button" > Back </button><a></td >
                </tr >
            </table>
        </form >    
</div >
</body >
</html >