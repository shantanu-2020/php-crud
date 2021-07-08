<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Add user </h2><br>
  <form action="add.php" method="post" enctype="multipart/form-data">
     <div class="form-group">
      <label>Name:</label>
      <input type="text" class="form-control" placeholder="Enter name" name="user_name">
    </div>
    <div class="form-group">
      <label>Email:</label>
      <input type="email" class="form-control" placeholder="Enter email" name="user_email">
    </div>
    <div class="form-group">
      <label>Password:</label>
      <input type="text" class="form-control"  placeholder="Enter password" name="user_password">
    </div>
    <div class="form-group">
      <label>Image:</label>
      <input type="file" class="form-control" placeholder="Enter email" name="user_image">
    </div>
    <div class="form-group">
      <label>Details:</label>
     <textarea class="form-control" name="user_details"></textarea>
    </div>
    <div class="form-group form-check">
      
    </div>
    <button type="submit" name="insert-btn" class="btn btn-primary">Submit</button>
  </form>
  <?php
     $conn = mysqli_connect('localhost','root','','webster');
    // if(mysqli_connect_errno()) {
    //  echo "Connection Fail";
    // }else{
    //  echo "Connection Ok";
    // }
    if(isset($_POST['insert-btn'])) {
       $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
     $user_password = $_POST['user_password'];
     $image = $_FILES['user_image']['name'];
     $tmp_name = $_FILES['user_image']['tmp_name'];
      $user_details = $_POST['user_details']; 

    $insert = "INSERT INTO user(user_name,user_email,user_password,user_image,user_details) VALUES('$user_name','$user_email','$user_password','$image','$user_details')";

    $run_insert = mysqli_query($conn,$insert);

    if($run_insert === true) {
      echo"Data has been inserted";
      move_uploaded_file($tmp_name,"upload/$image");
    }else{
      echo"Failed";
    }


    }
   
        
    ?>



</div>

</body>
</html>
