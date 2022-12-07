<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="menu.css" />
    <link rel="stylesheet" href="general-styles.css" />
    <title>Menu page</title>
  </head>
  <body>
    <main>
      <div class="primary-container">
        <div class="shop-title row center">
          <div class="logo-container">
            <img src="coffee-logo.png" alt="coffee logo" />
          </div>
          <h1 class="roboto-thin-100">ANG KAPE-RRANO</h1>
        </div>
        <p>KAPE NG MGA SERRANO</p>
      </div>
      <nav>
        <ul class="noto-serif">
          <a href="home.php"><li>HOME</li></a>
        </ul>
      </nav>
    </main>
    <div class="menu-container">
      <div class="menu">
        <div class="coffee-container">
          <img src="caffe-latte.jpg" alt="" />
          <h3>
            Caffe Latte <br />
            Price: 4$
          </h3>
        </div>

        <div class="coffee-container">
          <img src="caffe-mocha.jpg" alt="" />
          <h3>
            Caffe mocha<br />
            Price: 4$
          </h3>
        </div>

        <div class="coffee-container">
          <img src="cappucino.jpg" alt="" />
          <h3>
            Cappucino<br />
            Price: 3$
          </h3>
        </div>

        <div class="coffee-container">
          <img src="Espresso.gif" alt="" />
          <h3>
            Espresso<br />
            Price: 4$
          </h3>
        </div>
      </div>
      <div class="menu">
        <div class="coffee-container">
          <img src="caramel-macchiato.jpg" alt="" />
          <h3>
            Caramel macchiato<br />
            Price: 3$
          </h3>
        </div>

        <div class="coffee-container">
          <img src="brewed-coffee.jpg" alt="" />
          <h3>
            Brewed Coffee <br />
            Price: 4$
          </h3>
        </div>

        <div class="coffee-container">
          <img src="iced-coffee.jpg" alt="" />
          <h3>
            Iced Coffee <br />
            Price: 5$
          </h3>
        </div>

        <div class="coffee-container last">
          <img src="black-coffee.jpg" alt="" />
          <h3>
            Black coffee <br />
            Price: 4$
          </h3>
        </div>
      </div>
      <form class="buttons" method="POST">
        <label>ORDER FORM</label>
        <input
          class="noto-serif"
          type="text"
          placeholder="Username: "
          name="username"
        />
        <input
          class="noto-serif"
          type="password"
          placeholder="Password: "
          name="password"
        />
        <select name="coffeeTypes" class="noto-serif">
          <option value="CL1" >Caffe Latte</option>
          <option value="CM2" >Caffe Mocha</option>
          <option value="C3" >Cappucino</option>
          <option value="E4" >Espresso</option>
          <option value="CM5" >Caramel Macchiato</option>
          <option value="BC6" >Brewed Coffe</option>
          <option value="IC7" >Iced Coffee</option>
          <option value="BC8">Black Coffee</option>
        </select>
        <input type="number" name="quantity" placeholder="Quantity: " min="1" max="100">
        <input
          class="center noto-serif"
          type="submit"
          name="order"
          value="Order Now."
        />
      </form>
    </div>
  </body>
</html>
<?php 

  
include "dbcon.php";
if(isset($_POST["order"])) {
  $username = $_POST["username"];
  $password = md5($_POST["password"]);
  $username = stripslashes($username);
  $password = stripslashes($password);
  if($password == NULL OR $username == NULL) {
       echo "<script>alert('Please enter Username/Password');</script>"; 
  }
  
  else {
      $query = "SELECT username, user_password FROM TBL_USER WHERE username='$username' AND user_password='$password'";

      $result = mysqli_query($link,$query);
      $count = mysqli_num_rows($result);
      if($count > 0) {
        $getID = "SELECT user_id FROM TBL_USER WHERE username='$username' AND user_password='$password';";

        $result2 = mysqli_query($link, $getID);
        $count2 = mysqli_num_rows($result2);
        if($count2 > 0) {
          $row = mysqli_fetch_assoc($result2);
          $currentDate = date("Y/m/d");
          $query3 = "INSERT INTO tbl_orders (order_number, order_date,user_id)
              VALUES ('$row[user_id]'+100,'$currentDate','$row[user_id]')";
          $result3 = mysqli_query($link, $query3);
          if ($result3) {
            $totalPrice = 0;
            $menu_id;
            switch($_POST['coffeeTypes']) {
              case 'CL1':$totalPrice = 209.72 * $_POST['quantity']; $menu_id = "CL1"; 
              break;
              case "CM2":$totalPrice = 209.72 * $_POST['quantity']; $menu_id = "CM2";
              break;
              case "C3": $totalPrice = 157.29 * $_POST['quantity']; $menu_id = "C3";
              break;
              case "E4": $totalPrice = 209.72 * $_POST['quantity']; $menu_id = "E4";
              break;
              case "CM5": $totalPrice = 157.72 * $_POST['quantity']; $menu_id = "CM5";
              break;
              case "BC6": $totalPrice = 209.72 * $_POST['quantity']; $menu_id = "BC6";
              break;
              case "IC7": $totalPrice = 262.15 * $_POST['quantity']; $menu_id = "IC7";
              break;
              case "BC8": $totalPrice = 209.72 * $_POST['quantity']; $menu_id = "BC8";
              break;
            }
            $query4 = "INSERT INTO tbl_orderline (order_number, menu_id,number_order,total_price)
              VALUES ('$row[user_id]'+100,'$menu_id','$_POST[quantity]','$totalPrice')";
            $result4 = mysqli_query($link, $query4);
            if($result4) {
              header("Location: successfull.html");
            }
          }
        
        }
     
    }
    else{
        echo "<script>alert('Incorrect Username/Password to be able to order');</script>"; 
    }
  }
  mysqli_close($link);
}