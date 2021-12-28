
<?php
 session_start();
if(!isset($_SESSION['user'])){
  header("location: ../");
}
$profiles = array();

 $profiles =   $_SESSION['profiles'];
 $uid = $_SESSION['user'];
  $percentage = $_SESSION['percsetage'];
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
       
    <!-- linking db file -->
   <?php 
          include "db.php";
          $database = new Database();
  
           // taking data from house database by users
           $userbyhous = $database->selectQuery("SELECT COUNT(profile_id) FROM pols GROUP BY house_id;");
           $_SESSION['houses'] =  $userbyhous; 
           $housdata = $_SESSION['houses'];
           
           // taking data from votes database 
           $votes = $database->selectQuery("SELECT * FROM pols ;");
           $house = $database->selectQuery("SELECT * FROM house ;");
           $_SESSION['house'] =  $house  ;                      
           $_SESSION['pols'] =  $votes; 
           $votesdata = $_SESSION['pols'];
       
 ?>
    <title>Document</title>
</head>
<body>
    <div class="box"  >
        <form id="main"  action="vote.php"  method="POST">
          <h1>Profile</h1>
            <img src="assets/imagex/profile-icon.jpeg" width="20%" hieght="30%" alt="profile image icon ">
              <div class="input">
                    <ul class="userlist">
                  
                    <?php 
                        if($_SESSION['profiles']){
                        
                       for ($i=0; $i<count($profiles); $i++) { 
                        // $_SESSION['profilids'] = $profiles[$i]["id"]
                           ?>
                             <li class="userlist ">Name:  <?php echo $profiles[$i]["firstname"]. " ". $profiles[$i]["lastname"]; ?><br>
                                Gender:  <?php echo $profiles[$i]["gender"]; ?><br>
                                Age:  <?php echo $profiles[$i]["age"];?><br>   
                                <div id="result">  
                                votes in house <?php echo $house["house"]. " ". $percentage[$i]["score"];?><br>     
                                  </div>                  
                                <?php  $pid = $profiles[$i]["id"];?>   
                                <?php 
                                // taking data from votes database 
                                $votes = $database->selectQuery("SELECT COUNT(score) FROM pols where profile_id = $pid GROUP BY house_id;");
                                $_SESSION['score'] =  $votes; 
                                $votesdata = $_SESSION['score'];
                                ?>
                                <input type="hidden" name="gvotes" value="score: <?php echo$votesdata[$i]['score'];?>">
                                <input type="hidden" name="gid" value="<?php echo$profiles[$i]["id"];?>">                          
                              </li>                              
                               
                               <?php 
                                }
                                
                           }  ?>
    
                     </ul>
                     
                </div>

 <!-- soting in the houses -->
       <div class="house"> 
               <input type="submit" id="grf" value="Gryffindor" name="grf" class="house" />
               <input type="submit" id="slyf" value="Slythrin" name="sly" class="house" />
              <br>
        </div>
          <div class="house"> 
                  <input type="submit" id="slyf" value="Huffelepuff" name="huff" class="house" />
                  <input type="submit" id="slyf" value="Ravenclaw" name="ravn" class="house" />
              <br>
        </div>
      
        <!-- working with js now -->
        <input type="button" id="next" value="Next" class="input submit" onclick="movenextperson()"/>
        <div id="endpage" class=" hide" > 
          <h2> thanks you <?php echo$uid['firstname'];?>
             rated our all users </h2>
        <a href="logout.php"><button class="input submit " id="logoutbtn" onclick="submitForm('logout.php')">Bye</button></a>
        </div>

</form>   
</div>

<!-- js code -->
<script type="text/javascript">
    activeIndex = 0;
    var endbtn = document.getElementById("btn1");
    var nextbtn = document.getElementById('next');
    var userlist = document.getElementsByClassName("userlist");
    var housbtn = document.getElementsByClassName("house");
    var endpage =  document.getElementById("endpage");
    var form = document.getElementById('main');

    
    userlist[activeIndex].classList.add("isactive");

  function movenextperson(){
    activeIndex++;
   // activeIndex reaches the arry limit so it will be go back to zero
    if(activeIndex >= userlist.length){
      userlist[activeIndex].classList.remove("isactive");

      nextbtn.classList.add("hide");
   
      endpage.classList.remove("hide");
      }
      userlist[activeIndex].classList.add("isactive");
      nextbtn.classList.add("hide");
    };  

//calling function on next button 
nextbtn.addEventListener("click",function(){
      movenextperson();   
      activeIndex++;
      
    });
  

function submitForm(action) {
  
    form.action = action;
    form.submit();
  };
</script>
</body>
</html>
