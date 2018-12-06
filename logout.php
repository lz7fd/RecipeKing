<?php
    session_start();
    session_unset();
    session_destroy();
    header('Location: http://recipeking.epizy.com/test/index.html');

?>