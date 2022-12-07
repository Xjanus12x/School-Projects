<?php 

include "dbcon.php";

$query = "SELECT * FROM TBL_ORDERLINE";

?>
<ul>
  <li><a href="table.php">TBL_USER</a></li>
  <li><a href="table-ORDER.php">TBL_ORDER</a></li>
  <li><a href="table-ORDERLINE.php">TBL_ORDERLINE</a></li>
  <li><a href="home.php">HOME</a></li>
</ul>
<table border="2" align="center" >
  <caption>OrderLine Table</caption>
  <tr>
    <th>ORDER_NUMBER</th>
    <th>MENU_ID</th>
    <th>NUMBER_ORDER</th>
    <th>TOTAL_PRICE</th>
    <th>ACTION</th>
  </tr>

<?php
if($result = $link -> query($query)) {
  while($row = $result -> fetch_assoc()) {
    ?>
    <tr>
      <td><?php echo $row["order_number"]?></td>
      <td><?php echo $row["menu_id"]?></td>
      <td><?php echo $row["number_order"]?></td>
      <td><?php echo $row["total_price"]?></td>
      <td><ul>
        <li class="actions">
          <a <?php echo "href=tbl-orderline-delete.php?ordernumber=$row[order_number]"?>><img src="delete.png"></a>
         
        </li>
      </ul>
    </td>
    </tr>
    <?php
  }
  ?>
  </table>
  <?php
  $result -> free();
}

?>
<style>
   img {
    width: 1rem;
    height: 1rem;
  }
  .actions {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 1rem;
    margin-top: 1rem;
  }
  ul {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 2rem;
    margin-right: 2rem;
  }

a {
  color: black;
}
ul {
  list-style: none;
  display: flex;
  justify-content: center;
  gap: 2rem;
  font-size: 1.5em;
}
 tr {
  font-size: 1.5em;
 }
  table {
    border-collapse: collapse;
  }
  th {
    height: 5rem;
  }
  td {
    text-align: center;
  }
  th, td {
  padding: .5rem;
  }
  
caption {
  margin-top: 1rem;
  caption-side: bottom;
  font-size: 2rem;
}
th {
  background: seagreen;
}
tr:nth-child(even){background-color: #f2f2f2;}

tr:hover {background-color: #ddd;}
</style>