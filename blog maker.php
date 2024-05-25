<!DOCTYPE html>
<html lang="en">
<?php 
    $servername = "localhost"; // or your server's IP address
    $username = "root";
    $password = "";
    $database = "blogging";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);
    // Check connection
    if ($conn->connect_error) {
        echo '<script>alert("not connected to server");</script>';
    } else {
        if(isset($_POST['create'])){
            $blog_elements = explode(",",$_POST['hiddenInput']);
            foreach($blog_elements as $blog_part){
                echo $blog_part."<br>";
            }
        }
    }
?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog Container - Bootstrap 5</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
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
    /* Custom CSS for blog container */
    .blog-container {
      width: 80%;
      min-height: 100vh; /* Minimum height of 100% of the viewport height */
      margin: auto; /* Center the container horizontally */
      background-color: white;
      padding: 20px; /* Add padding to keep content away from container edges */
    }
  </style>
</head>
<body>

<div class="container-fluid blog-container">
  <!-- Your blog content goes here -->
  <h1>Welcome to My Blog</h1>
  <p>This is a sample blog container with 80% device width and 100% device height.</p>
  <form method="post" action="blog maker.php">
  <div id="mainContainer">
    <!-- Inputs will be appended here -->
</div>

<button class="btn btn-primary" id="addInput">Add Input</button>
<button class="btn btn-primary" id="addParagraph">Add Paragraph</button>
<button class="btn btn-primary" id="addlink">Add Link</button>
<button id="addImage" class="btn btn-primary">Add Image</button>
<button id="addaudio" class="btn btn-primary">Add Audio</button>
<button id="addvideo" class="btn btn-primary">Add Video</button>

<!-- Hidden textarea to store input names -->
<textarea id="hiddenInput" name="hiddenInput" style="display:none;"></textarea>

  <input type="submit" class="btn btn-primary" value="Create Blog" name="create">
</form>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
$(document).ready(function(){
    // Counter for generating unique names
    var counter = 1;

    $("#addParagraph").click(function(event){
        event.preventDefault(); // Prevent default behavior (e.g., form submission or page reload)

        // Create a new textarea element
        var textarea = $("<textarea>").attr({
            name: "blogparagraph_" + counter, // Unique name for each textarea
            class: "form-control",
            placeholder: "Add your blog paragraph here"
        });

        // Create delete button
        var deleteButton = $("<button>").attr({
            type: "button",
            class: "deleteBtn btn btn-danger" // Add the classes for Bootstrap button styling
        }).text("Delete");

        // Create container div for textarea and delete button
        var container = $("<div>").addClass("inputContainer");

        // Append textarea and delete button to container
        container.append(textarea, deleteButton);

        // Append the container to main container
        $("#mainContainer").append(container);

        // Increment counter
        counter++;

        // Update hidden textarea with comma-separated list of input names
        updateHiddenInput();
    });
    $("#addInput").click(function(event){
        event.preventDefault(); // Prevent default behavior (e.g., form submission or page reload)

        // Create a new textarea element
        var Input = $("<input>").attr({
            type:"text",
            name: "blogsection_" + counter, // Unique name for each textarea
            class: "form-control",
            placeholder: "Add your blog section name here"
        });

        // Create delete button
        var deleteButton = $("<button>").attr({
            type: "button",
            class: "deleteBtn btn btn-danger" // Add the classes for Bootstrap button styling
        }).text("Delete");

        // Create container div for textarea and delete button
        var container = $("<div>").addClass("inputContainer");

        // Append textarea and delete button to container
        container.append(Input, deleteButton);

        // Append the container to main container
        $("#mainContainer").append(container);

        // Increment counter
        counter++;

        // Update hidden textarea with comma-separated list of input names
        updateHiddenInput();
    });

    $("#addlink").click(function(event){
        event.preventDefault(); // Prevent default behavior (e.g., form submission or page reload)

        // Create a new textarea element
        var link = $("<input>").attr({
            type:"link",
            name: "bloglink_" + counter, // Unique name for each textarea
            class: "form-control",
            placeholder: "Add your blog links here"
        });

        // Create delete button
        var deleteButton = $("<button>").attr({
            type: "button",
            class: "deleteBtn btn btn-danger" // Add the classes for Bootstrap button styling
        }).text("Delete");

        // Create container div for textarea and delete button
        var container = $("<div>").addClass("inputContainer");

        // Append textarea and delete button to container
        container.append(link, deleteButton);

        // Append the container to main container
        $("#mainContainer").append(container);

        // Increment counter
        counter++;

        // Update hidden textarea with comma-separated list of input names
        updateHiddenInput();
    });

    $("#addImage").click(function(event){
        event.preventDefault();

        // Create a new input element of type file for images
        var inputFile = $("<input>").attr({
            type: "file",
            name: "blogimage_" + counter, // Unique name for each input
            accept: "image/*" // Accept only image files
        });

        // Create label for input file element
        var label = $("<label>").text("Add your blog images here");

        // Create delete button
        var deleteButton = $("<button>").attr({
            type: "button",
            class: "deleteBtn btn btn-danger" // Add the classes for Bootstrap button styling
        }).text("Delete");

        // Create container div for input file and delete button
        var container = $("<div>").addClass("inputContainer");

        // Append input file, label, and delete button to container
        container.append(label, inputFile, deleteButton);

        // Append the container to main container
        $("#mainContainer").append(container);

        // Increment counter
        counter++;

        // Update hidden textarea with comma-separated list of input names
        updateHiddenInput();
    });
    $("#addaudio").click(function(event){
        event.preventDefault();

        // Create a new input element of type file for images
        var inputaudio = $("<input>").attr({
            type: "file",
            name: "blogaudio_" + counter, // Unique name for each input
            accept: "audio/*" // Accept only image files
        });

        // Create label for input file element
        var label = $("<label>").text("Add your blog audio here");

        // Create delete button
        var deleteButton = $("<button>").attr({
            type: "button",
            class: "deleteBtn btn btn-danger" // Add the classes for Bootstrap button styling
        }).text("Delete");

        // Create container div for input file and delete button
        var container = $("<div>").addClass("inputContainer");

        // Append input file, label, and delete button to container
        container.append(label, inputaudio, deleteButton);

        // Append the container to main container
        $("#mainContainer").append(container);

        // Increment counter
        counter++;

        // Update hidden textarea with comma-separated list of input names
        updateHiddenInput();
    });
    $("#addvideo").click(function(event){
        event.preventDefault();

        // Create a new input element of type file for images
        var inputvideo = $("<input>").attr({
            type: "file",
            name: "blogvideo_" + counter, // Unique name for each input
            accept: "video/*" // Accept only image files
        });

        // Create label for input file element
        var label = $("<label>").text("Add your blog videos here");

        // Create delete button
        var deleteButton = $("<button>").attr({
            type: "button",
            class: "deleteBtn btn btn-danger" // Add the classes for Bootstrap button styling
        }).text("Delete");

        // Create container div for input file and delete button
        var container = $("<div>").addClass("inputContainer");

        // Append input file, label, and delete button to container
        container.append(label, inputvideo, deleteButton);

        // Append the container to main container
        $("#mainContainer").append(container);

        // Increment counter
        counter++;

        // Update hidden textarea with comma-separated list of input names
        updateHiddenInput();
    });

    // Add more button click handlers for other elements (audio, video, link)...

    // Function to update hidden textarea with comma-separated list of input names
    function updateHiddenInput() {
        var names = [];
        $("input[type='text'], textarea, input[type='file'],input[type='link']").each(function() {
            names.push($(this).attr("name"));
        });
        $("#hiddenInput").val(names.join(","));
    }

    // Delete button click event handler
    $(document).on("click", ".deleteBtn", function() {
        $(this).parent().remove(); // Remove the container
        updateHiddenInput(); // Update hidden textarea
    });
});
</script>
</body>
</html>
