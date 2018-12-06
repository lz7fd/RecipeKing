<?php   
       
        
                $username = $_SESSION['username'];
                $recipe_name = $_SESSION['recipe'];
                $review = empty($_POST['review']) ? '' : $_POST['review'];
                
        
    
                require_once "db.conf";

                $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    

                if ($mysqli->connect_error) {
                die('Connect Error (' . $mysqli->connect_errno . ') '
                    . $mysqli->connect_error);
                    echo " connection failed! ";
                }
    
           
    

                $query = "INSERT INTO reviews(username, recpie, review) INTO VALUES ('$username', '$recipe_name', '$review')";


                $mysqliResult = $mysqli->query($query);
    
                header('Location: http://recipeking.epizy.com/test/index.html');
                
                    $mysqliResult->close();
                    $mysqli->close();
     
                   
?>