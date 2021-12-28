
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <title>Document</title>

  </head>
  <body>
   <!-- linking db file -->
   <?php
  include "db.php";
  
  ?>
  <!-- welcome page -->
<form class="box" id="main" method="post">

  <h1>WELL COME</h1>
  <img src="assets/imagex/sorting-hat.jpeg" width="275px" hieght="600px">
 
  <input type="button" id="btn1" value="Add Person" class="input submit" onclick="submitForm('profile.php')"/>
  <input type="button" id="btn2" value="Add People in House" class="input submit" onclick="submitForm('sort.php')" />

</form>

<!-- js function to switch between buttons -->
<script type="text/javascript">
  function submitForm(action) {
    var form = document.getElementById('main');
    form.action = action;
    form.submit();
  }
</script>
  </body>
</html>

 