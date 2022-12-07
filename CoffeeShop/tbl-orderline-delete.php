<?php 
include "dbcon.php";
if(isset($_GET['ordernumber'])) {
  $orderNumber = $_GET['ordernumber'];
  $query = "DELETE FROM TBL_ORDERLINE WHERE order_number=$orderNumber";
  $result= mysqli_query($link,$query);
  if($result) {
    header("Location: table-ORDERLINE.php");
  }
}
?>