<?php session_start(); ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">
      <h2>Login Form</h2><br>
    <form action="" method="post">
  <div class="mb-3">
    <label>Email address</label>
    <input type="email" name="email" class="form-control">
   
  </div>
  <div class="mb-3">
    <label>Password</label>
    <input type="password" name="password" class="form-control">
  </div>
  
  <button type="submit" name="login-btn" class="btn btn-primary">Submit</button>
</form>
<?php 
$conn = mysqli_connect('localhost','root','','webster');
if(isset($_POST['login-btn'])) {
 $email = $_POST['email'];
 $password = $_POST['password'];

 $select = "SELECT * FROM user WHERE user_email='$email'";
         $run = mysqli_query($conn,$select);
         $row_user = mysqli_fetch_array($run);

          $db_email = $row_user['user_email'];
         $db_password = $row_user['user_password'];

         if($email == $db_email && $password == $db_password) {
          echo "<script>window.open('view.php','_self');</script>";
          $_SESSION['email'] = $db_email;
         }else{
          echo "username and password does not match";
         }

}
 ?>

</div>
  </body>
</html>