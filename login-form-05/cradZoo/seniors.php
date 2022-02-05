
<?php
      require_once "../components/db_connect.php";
      require_once "../components/navbar.php";

     if(!isset($_SESSION)) 
      { 
          session_start(); 
      } 
      if( !isset($_SESSION['adm']) && !isset($_SESSION['user' ]) ) {
            header("Location: ../login/login.php");
            exit;
           }
?>
<a  class="btn-danger" href="../login/logout.php?logout">Sign Out </a><br>
<div class ="container">
<h1 class="text-center">Seniors</h1>
<div class="row" id="content"></div>



<script>
function loadDoc() {
let xhttp = new XMLHttpRequest();
xhttp.onload = function() {
if (this.status == 200 ) {
 document.getElementById("content").innerHTML =this.responseText;

}
};
var name=document.getElementById("search").value;
xhttp.open("GET", '../components/a_seniors.php?search='+name , true); //(method, URL, async)
xhttp.send();
}

loadDoc();

document.getElementById("search").addEventListener("keyup",loadDoc);
</script>     
</body>
</html>
