<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Website</title>
  <link rel="stylesheet" href="style.css">
  <script src="index.js"></script>
</head>
<body>
  <img class="bg" src="bg.jpg" alt="bg">
  <div class="container">
  <h2 class="heading">Welcome to Trip Form</h2>
  <p class="headline">Enter your details and submit this form to confirm your seat!</p>
  </div>
  <div class="form">
   <form action="index.php" method="post">

    <input type="text" name="name" id ="name" placeholder="Enter your name">

    <input type="text" name="reg_no" id="reg_no" placeholder="Your Registration No.">

    <input type="email" name="email" id="email" placeholder="Enter your email">

    <input type="tel" name="phone" id="phone" placeholder="Enter your phone">

    <textarea name="description" id="description" placeholder="Enter the Other Info or Description"></textarea>

    <div class="btn">
    <button type="submit">Submit</button>
    <button type="reset">Reset</button>
    </div>
  </form>
  </div>
</body>
</html>

<?php
  $insert = false; //initially it remains false

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
 //Connecting to Database
  $server = "localhost";
  $username = "root";
  $password = "password";
  $database = "trip";

//Create a DB Connection
  $conn = mysqli_connect($server, $username, $password, $database);

//Check for connection success
  if(!$conn){
    die("connection failed" . mysqli_connect_error());
  } else {
    // echo ("connected");
  }

//Collect the post variable
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$description = $_POST['description'] ?? '';
$phone = $_POST['phone'] ?? '';
$reg_no = $_POST['reg_no'] ?? null;
var_dump($_POST);

  $sql = "INSERT INTO `trip`.`users`(`name`, `email`, `description`, `phone`, `reg_no`) VALUES ('$name', '$email', '$description', '$phone', '$reg_no')";

  //Execute the query
  if($conn->query($sql) == true){

    //Flag for successful insertion
    $insert = true;
  } else {
    echo "Error: $conn->error";
  }

  //Close the DB Connection
  $conn->close();
  }

  if($insert == true){
    echo "<p class='submitMsg'>Thanks for giving your details.</p>";
  }
?>