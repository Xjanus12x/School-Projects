<?php 
include "dbcon.php";
if(isset($_GET['deleteid'])) {
  $id = $_GET['deleteid'];
  $query = "DELETE FROM TBL_USER WHERE user_id=$id";
  $result= mysqli_query($link,$query);
  if($result) {
    header("Location: table.php");
  }
}
?>