<?php 
                    //$recipe_name="<script>document.writeln(document.getElementById('recipeName').innerHTML);</script>";
                    //if(isset($_POST['var'])) $recipe_name=$_POST['var'];
                    //echo $recipe_name;
                    $username = $_SESSION['username'];
                    $status = $_SESSION['login'];
                    //$_SESSION['recipe'] = $recipe_name;
            
                    //echo $username;
                    //echo $status;
                    //echo $_SESSION;
                    
                    require_once "db.conf";

                    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    

                    if ($mysqli->connect_error) {
                    die('Connect Error (' . $mysqli->connect_errno . ') '
                        . $mysqli->connect_error);
                        echo " connection failed! ";
                    }

                    echo $recipe_name;
                    echo " TEST! ";


                    $query = "SELECT review FROM reviews WHERE username = '$username' AND recipe = '$recipe_name'";


                    $mysqliResult = $mysqli->query($query);

                    while($row = $mysqliResult->fetch_assoc()) {
                        print $row['review'];
                    }
                    $mysqliResult->close();
                    $mysqli->close();
                    if($status == "true"){
                        echo "<form action='reviews.php' method='POST'><textarea id='review' name='review' placeholder='Leave comments here'><input type='hidden' value='document.getElementById('exampleModalLabel').innerHTML'></textarea><input type='submit' value='Submit'></from>";
                    }
                    
                    ?>