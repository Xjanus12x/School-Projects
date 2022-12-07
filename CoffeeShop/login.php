<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="login.css" />
    <link rel="stylesheet" href="general-styles.css" />
    <title>Login page</title>
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
        <form action="login.php" class="buttons" method="POST">
          <input
            class="center noto-serif"
            type="text"
            placeholder="Username: "  
            name="username"
          />
          <input
            class="center noto-serif"
            type="password"
            placeholder="Password: "
            name="password"
          />
          <input class="login-button center noto-serif" type="submit" value="Login" name="login"/>
        </form>
        <footer class="logos center">
          <img src="fb-logo.png" alt="facebook logo" />
          <img src="ig-logo.png" alt="instagram logo" />
          <img src="twitter-logo.png" alt="twitter logo" />
        </footer>
      </div>
    </main>
  </body>
</html>

<?php 


include "dbcon.php";
if(isset($_POST["login"])) {
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
        header("Location: home.php");
        die;
      }
      else {
       echo "<script>alert('Incorrect Username/Password');</script>"; 

      }
      mysqli_close($link);
  }
  
}
?>




