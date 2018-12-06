
<?php

    session_start();

    $username = empty($_POST['username']) ? '' : $_POST['username'];
    $password = empty($_POST['password']) ? '' : $_POST['password'];
        
    
    require_once "db.conf";

    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    

    if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
          . $mysqli->connect_error);
        echo " connection failed! ";
    }


    $q = "SELECT id FROM users WHERE username = '$username' AND password = '$password'";

    $mysqliResult = mysqli_query($mysqli, $q);

    $num = mysqli_num_rows($result);

    if($num == 1){
        echo" duplicate data ";
    }else{

        $qy= " insert  into users(username , password) values ('$username' , '$password') ";
        mysqli_query($mysqli, $qy);
    }
    header('Location: http://recipeking.epizy.com/test/index.html');

    $mysqliResult->close();
    $mysqli->close();
    $qy->close();
    
    exit;
                
?>
