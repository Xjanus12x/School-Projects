<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
  </head>
  <body>
    <!DOCTYPE html>
    <html lang="en">
      <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="register.css" />
        <link rel="stylesheet" href="general-styles.css" />   
        <title>Login/Register</title>
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
            <form class="buttons" method="POST">
              <div class="left">
                <input class="noto-serif" type="text" placeholder="Username: " name="username"/>
                <input class="noto-serif" type="password" placeholder="Password: " name="password"/>
                <input class="noto-serif" type="text" placeholder="Address: " name="address"/>
                <input class="noto-serif" type="text" placeholder="Phone Number: " name="phonenumber"/>
              </div>
              <div class="right">
                <input class="noto-serif" type="text" placeholder="Birthday: (Y-M-D)" name="birthday" />
                <input class="noto-serif" type="text" placeholder="User Type (Customer(C)/Employee(E)): " name="usertype"/>
                 <input class="center noto-serif" type="submit" name="submit" value="Submit">
              </div>

              
            </form>

            <footer class="logos">
              <img src="fb-logo.png" alt="facebook logo" />
              <img src="ig-logo.png" alt="instagram logo" />
              <img src="twitter-logo.png" alt="twitter logo" />
            </footer>
          </div>
        </main>
      </body>
    </html>
  </body>
</html>

<?php
include "dbcon.php";
$id = $_GET['userid'];
 if(isset($_POST['submit'])) {
   $username = $_POST['username'];
   $password = md5($_POST['password']);
   $address = $_POST['address'];
   $phone_number = $_POST['phonenumber'];
   $birthday = $_POST['birthday'];
   $user_type = strtoupper(substr($_POST['usertype'],0,1));

   
   $sql="UPDATE TBL_USER SET user_id=$id, username=$username,user_password=$password,address=$address, phone_number=$phone_number, birthday=$birthday,user_type=$user_type WHERE user_id=$id";
   $result = mysqli_query($link,$sql);
    if($result) {
      header("Location: table.php");       
      mysqli_close($link);
  } 
 }
?>