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
                 <input class="center noto-serif" type="submit" name="register" value="Register">
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
 if(isset($_POST['register'])) {
   $username = $_POST['username'];
   $password = md5($_POST['password']);
   $address = $_POST['address'];
   $phone_number = $_POST['phonenumber'];
   $birthday = $_POST['birthday'];
   $user_type = strtoupper(substr($_POST['usertype'],0,1));
  if($username == null OR $password == null OR $address == null OR $phone_number == null OR $birthday == null OR $user_type == null) {
    echo "<script>alert('Please fill up the form');</script>"; 
  }
  else {
      $query1 = "SELECT username FROM tbl_user WHERE username='$username'";
      $result1 = mysqli_query($link, $query1);
      $count = mysqli_num_rows($result1);
      if($count > 0) {
        echo "<script>alert('Username already exist. Please enter again.');</script>"; 
      }
      else {
        $query2 = "INSERT INTO tbl_user (user_id,username, user_password, address, phone_number, birthday, user_type)
              VALUES (NULL, '$username', '$password', '$address', $phone_number, $birthday, '$user_type')";
        $result2 = mysqli_query($link, $query2);
        if ($result2) {
        header("Location: index.html");
        }
      }
      mysqli_close($link);
  } 
 }
?>