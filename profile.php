
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

 
  ?>
      <!-- form inputs -->
  <div class="box">
<form  action="congrates.php" method="POST">

  <h1>Create Profile</h1>
  <img src="assets/imagex/profile-icon.jpeg" width="20%" hieght="15%" alt="profile image icon ">
  <label for="fname"></label>
  <input type="text" name="fname" placeholder="First Name" class="input" id="fname" required> 
  <label for="lname"></label>
  <input type="text" name="lname" placeholder="Last Name" class="input" id="lname"  required> 

  <div > 
  <input type="radio" name="gender" value="Male"  class="gender " id="Male" required>
  <label for="Male">Male</label>
  <input type="radio" name="gender" value="Female" class="gender" id="female" >
  <label for="female">Female</label>
  <br>
  </div>
 
  <label for="form-age"></label>
  <input type="number"  name="age" id="age" placeholder="AGE" min="18" required class="input"/>
  
  <label for="email"></label>
  <input type="Email" name="email" placeholder="Email" class="input" required> 
  <div>
 <label for="intresst"></label>
  <textarea name="intresst" placeholder="About your intresst" rows="2" cols="30" class="input" id="intresst" required></textarea>
</div>
 
  <input type="submit" name="" value="Add Person" class="input submit">
</form>
</div>
    
</body>
</html>