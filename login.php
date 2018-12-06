
<?php

    session_start();

    $username = empty($_POST['username']) ? '' : $_POST['username'];
    $password = empty($_POST['password']) ? '' : $_POST['password'];
    
    $_SESSION['username'] = $username;
    $_SESSION['login'] = "true";
    
    require_once "db.conf";

    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    

    if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
          . $mysqli->connect_error);
        echo " connection failed! ";
    }
    

    

    $query = "SELECT id FROM users WHERE username = '$username' AND password = '$password'";


    $mysqliResult = $mysqli->query($query);
    

        if ($mysqliResult) {
            $match = $mysqliResult->num_rows;
            $mysqliResult->close();
            $mysqli->close();
            echo $match;
            
        }
  		if ($match == 1) {
            header('Location: http://recipeking.epizy.com/test/index.html');
            echo "success";
            exit;
        }
           
    
        //require "index.html";

    
    
    
   
        


               
                $result->close();
                $mysqli->close();
                
                
?>
