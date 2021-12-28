
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">

    <title>Document</title>
</head>
<body>
      <!-- linking db file -->
<?php
session_start();
  include "db.php";
  
// creating database 
$database = new Database();
// get the data from form inputs
   $firstname = $_POST["fname"];
  $lastname = $_POST["lname"];
   $age =  (int)$_POST["age"];
   $email = $_POST["email"];
   $intrest = $_POST["intresst"];
  
   $data = $database->selectQuery("SELECT * FROM profile");
   $_SESSION['profiles'] =  $data;
    if (isset($_REQUEST["gender"])){
      $gender = $_REQUEST["gender"];
     
      //insert into database
        $formdata =  $database->insertQuery("INSERT INTO profile (firstname,lastname,gender, age, email,hobby)
        VALUES ('$firstname','$lastname','$gender','$age','$email','$intrest')");
 }
 $_SESSION['user'] = $formdata ;
// if($formdata){
//   echo "helloooooo";

  
// }
// else{
//   echo "soory";
// }

  ?>

  <form class="box" id="main" action="sort.php" method="POST">

<h2> Profile added to your database!!</h2>
<img src="assets/imagex/congrats.jpeg" width="300px" hieght="500px">

<input type="submit"  value="Put People in House" class="input submit"  />

</form>

</body>
</html>