        <?php 
            session_start();
            header("location: http://localhost:8888/sort.php");
            include "db.php";
            $database = new Database();
            $_SESSION['percsetage'];
            $points = $_POST['gvotes'];
            $total_point = $points+1;
            $profileid = $_POST['gid'];
            $uid = $_SESSION['user']['id'];
            $housdata = $_SESSION['houses'];
            
            if( array_key_exists( 'Gryffindor', $_POST ) )
            {
            $houseid = 1;
            $sql =  $database->updateQuery(" UPDATE pols SET score = $total_point  WHERE house_id = '$houseid'  AND profile_id = '$profileid';");
       
          //retiriving
          $data_by_house = $database->selectQuery("SELECT profile_id,COUNT(score) FROM pols GROUP BY profile_id;");
         $_SESSION['percsetage'] =  $data_by_house;
           
            }
     //Slythrin
            if( array_key_exists( 'Slythrin', $_POST ) )
            {
            $houseid = 2;
            $sql =  $database->updateQuery(" UPDATE pols SET score = $total_point  WHERE house_id = '$houseid'  AND profile_id = '$profileid';");
       
          //retiriving
          $data_by_house = $database->selectQuery("SELECT profile_id,COUNT(score) FROM pols GROUP BY profile_id;");
         $_SESSION['percsetage'] =  $data_by_house;
         $data = $database->selectQuery("SELECT firstname,lastname,gender,age FROM profile");
         $_SESSION['profiles'] =$data;
            }
         //Huffelepuff   
            if( array_key_exists( 'Huffelepuff', $_POST ) )
            {
            $houseid = 4;
            $sql =  $database->updateQuery(" UPDATE pols SET score = $total_point  WHERE house_id = '$houseid'  AND profile_id = '$profileid';");
            $data = $database->selectQuery("SELECT firstname,lastname,gender,age FROM profile");
            $_SESSION['profiles'] =$data;
          //retiriving
          $data_by_house = $database->selectQuery("SELECT profile_id,COUNT(score) FROM pols GROUP BY profile_id;");
         $_SESSION['percsetage'] =  $data_by_house;
            $data = $database->selectQuery("SELECT firstname,lastname,gender,age FROM profile");
            $_SESSION['profiles'] =$data;
            }
           // Ravenclaw     
            if( array_key_exists( 'Ravenclaw', $_POST ) )
            {
            $houseid = 3;
            $sql =  $database->updateQuery(" UPDATE pols SET score = $total_point  WHERE house_id = '$houseid'  AND profile_id = '$profileid';");
       
          //retiriving
          $data_by_house = $database->selectQuery("SELECT profile_id,COUNT(score) FROM pols GROUP BY profile_id;");
         $_SESSION['percsetage'] =  $data_by_house;
         $data = $database->selectQuery("SELECT firstname,lastname,gender,age FROM profile");
         $_SESSION['profiles'] =$data;
            }
        
        
        ?>
