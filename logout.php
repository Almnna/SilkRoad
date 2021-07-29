<?php 
    session_start();

    if(!empty($_SESSION))
    {
        setcookie("loggedout_user", $_SESSION["username"], time() + (3));
        session_unset();
        session_destroy();
        header("Location: http://localhost/index.php");
    }else{
        header("Location: http://localhost/dashboard.php");
    }

?>