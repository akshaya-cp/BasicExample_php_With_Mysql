<?php
$insert=false;
if(isset($_POST['name'])){
  $server = "localhost";
  $username = "root";
  $password = "";

  $con = mysqli_connect($server,$username,$password);

  if(!$con){
    die("connection to this database failed due to ". mysqli_connect_error());
  }
  // echo "Success connecting to the db";
  $name = $_POST['name'];
  $gender= $_POST['gender'];
  $age= $_POST['age'];
  $email  = $_POST['email'];
  $phone= $_POST['phone'];
  $desc= $_POST['desc'];

  $sql = "INSERT INTO `Trip`.`Trip` ( `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ( '$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";

  if(($con)->query($sql)==true){
    $insert=true;
    // echo "Successfully inserted";
  }
  else{
    echo "sdkmsmdcd";
    echo "ERROR: $sql <br> $con->error";
  }

  $con->close();
}  
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome to Travel Form</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Sriracha&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Sriracha&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <!-- <img class="bg" src="bg.jpg" alt="HBTU KANPUR"> -->
  <img class="bg" src="bg1.jpg" alt="HBTU KANPUR">
  <div class="container">
    <h1>Welcome To HBTU Kanpur Dharamshala Travel Form</h1>
    <p>Enter your details and submit this form to confirm your participation in the trip</p>
    <?php
    if($insert==true){
      echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining us for the Dharamshala trip</p>";
    }
    ?>
    <form action="index.php" method="post">
      <input types="text" name="name" id="name" placeholder="Enter your name">
      <input types="text" name="age" id="age" placeholder="Enter your age">
      <input types="text" name="gender" id="gender" placeholder="Enter your gender">
      <input types="email" name="email" id="email" placeholder="Enter your email">
      <input types="phone" name="phone" id="phone" placeholder="Enter your phone">
      <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
      <button class="btn">Submit</button>
      
    </form>
  </div>
  <script src="index.js"></script>
</body>
</html>

