<!DOCTYPE html>
<?php
// MySQL database credentials
$servername = "localhost"; // or your server's IP address
$username = "root";
$password = "";
$database = "blogging";

// Createecho connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    echo '<script>alert("not connected to server");</script>';
}else{
  if(isset($_POST['login'])){
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $query1 = "SELECT * FROM `bloggers`";
    $result1 = mysqli_query($conn, $query1);
$emails = array();
if($result1->num_rows > 0){
  while($row = $result1->fetch_assoc()){
    array_push($emails,$row['email']);
  }
}
if(in_array($email, $emails)){
  $query2 = "SELECT `first name`, `last name`, `email`, `password`, `logged in or not`, `user id` FROM `bloggers` WHERE `email` = '$email'";
  $result2 = $conn->query($query2);
  if($result2 !== false && $result2->num_rows > 0) {
      $row = $result2->fetch_assoc(); // Fetch the data from the result set
      $password_hashed = $row['password'];
      $id = $row['user id'];

      if(password_verify($pass, $password_hashed)){
          $data = array('user_id' => $id);
          $query_string = http_build_query($data);
          header("Location: account.php?$query_string");
          exit; // Always exit after redirecting
      } else {
          echo "<script>alert('Wrong password!');</script>";
      }
  } else {
      echo "<script>alert('Account with $email does not exist');</script>";
  }
} else {
  echo "<script>alert('Account with $email does not exist');</script>";
}

}
}
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Custom styles for this template */
    body {
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: #0366fc;
      background-image: linear-gradient(#0366fc,#ffffff,#0366fc);
    }
    .login-form {
      width: 350px;
      padding: 20px;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>
<body>
  <div class="login-form">
    <h2 class="text-center mb-4">Login</h2>
    <form method="post" action="account log in.php">
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control" id="email" name="email" placeholder="Enter your registered email id">
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
      </div>
      <a class="text-muted" href="create account.php">Create account</a>
      <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
    </form>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
