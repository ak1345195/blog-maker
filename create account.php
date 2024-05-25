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
} else {
    if(isset($_POST["register"])){
      $fname = $_POST['first_name'];
      $lname = $_POST['last_name'];
      $email = $_POST['email'];
      $pass = $_POST['password'];
      $login = 0;
// Hash the password
$hashedPassword = password_hash($pass, PASSWORD_DEFAULT);
$query1 = "SELECT * FROM `bloggers`";
$result1 = mysqli_query($conn, $query1);
$emails = array();
$user_ids = array();
if($result1->num_rows > 0){
  while($row = $result1->fetch_assoc()){
    array_push($emails,$row['email']);
    $user_id = intval($row['user id']);
    array_push($user_ids,$user_id);
  }
}
$user_id_a = 0;
regenerate:
$user_id_a = mt_rand(1000000000,9999999999);
if(in_array($user_id_a,$user_ids)){
  goto regenerate;
}
  if(in_array($email,$emails)){
    echo "<script>alert('an account with ".$email." already exist');</script>";
  }else{
  $query2 = "INSERT INTO `bloggers`(`first name`, `last name`, `email`, `password`, `logged in or not`,`user id`) VALUES ('".$fname."','".$lname."','".$email."','".$hashedPassword."','".$login."','".$user_id_a."')";
  $result2 = $conn->query($query2);
  if($result2 === TRUE){
    echo "<script>alert('Your account is added successfully');</script>";
  }else{
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}


}
}
// Close connection
$conn->close();
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Page</title>
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
    .registration-form {
      width: 350px;
      padding: 20px;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>
<body>
  <div class="registration-form" style="background-color:white !important">
    <h2 class="text-center mb-4">Register</h2>
    <form action="create account.php" method="post">
      <div class="mb-3">
        <label for="first_name" class="form-label">First Name</label>
        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter your first name" required>
      </div>
      <div class="mb-3">
        <label for="last_name" class="form-label">Last Name</label>
        <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Enter your last name" required>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Enter password" required>
      </div>
      <button type="submit" name="register" class="btn btn-primary w-100">Create Account</button>
    </form>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
