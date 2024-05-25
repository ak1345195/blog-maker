<!DOCTYPE html>
<html lang="en">
  <?php
  $name = $_GET['user_id'] ?? '';
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
  
}
  ?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Centered Blog Page</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <!-- Custom CSS -->
  <style>
    /* Custom styles for the blog page */
    body, html {
      height: 100%;
    }
    body {
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: #0366fc;
      background-image: linear-gradient(#0366fc,#ffffff,#0366fc);
    }
    .blog-container {
        width: 80%;
      height: 100% !important;
      margin: 0 auto;
      padding: 20px;
      background-color: white !important;
    }
  </style>
</head>
<body>
  <div class="blog-container">
    <div class="row border-bottom p-3">
        <div class="col-md-3">
            <img class="rounded" style="height:250px;width:250px;" src="" alt="">
        </div>
        <div class="col-md-9">
            <h1>Author's name</h1>
            <p>blog channel description</p>
        </div>
    </div>
    <div class="row border-bottom" style="height: 50px;">
    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#blogs">Blogs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#sb">Short Blogs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#posts">community posts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#info">Information</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
  
<div class="container page" id="blogs">
<h1>Blogs</h1>
<div class="card">
        <div class="card-body">
          <h5 class="card-title">Card Title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
</div>
<div class="container page" id="sb">
  <h1>Short Blogs</h1>
</div>
<div class="container page" id="posts">
  <h1>community posts</h1>
</div>
<div class="container page" id="info">
  <h1>Information</h1>
</div>
</div>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
<script>
  $(document).ready(function(){
  $('.page').hide();
  $('#channels').show();
  $(".nav-link").click(function() {
      var target = $(this).attr("href"); // Get the target section
      $(".page").hide(); // Hide all pages
      $(target).show(); // Show the target page
    });
});
</script>
