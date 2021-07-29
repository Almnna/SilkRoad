<?php
    $database_name = "";
    $User_error = false;
    $user_error = "";
    $Email_error = false;
    $Pass_error = false;
    $pass_error = "";
    $conn = "";
    $tasks_data = "";
    $username = "";
    $password = "";

    /*****Singup Variables*****/
    $sign_username =  "";
    $sign_email = "";
    $sign_password = $sign_confirm_password = "";
    $temp_username = "";
    /*************************/

    /***********Dashboard Variables**********/
    // $item_details = "";
    /***************************************/
    // if(isset($_POST['add']))
    // {
    //     if(!empty($_POST['task']))
    //     {
    //         $task = $_POST['task'];
    //         $task = sanitize($task);
    //         insert_task($task);
    //     }
    // }

    function open_connection()
    {
        global $conn;
        //$conn = new mysqli("localhost", "root", "", "silkroadusers");
        $conn = new mysqli("localhost:3306", "root", "j12341234", "silkroadusers");
        if($conn->connect_error)
        {
            echo $conn->connect_error;
            die();
        }
    }

    function close_connection()
    {
        global $conn;
        if($conn)
        {
            $conn->close();
        }
    }


    function sanitize($var)
    {
        $var = trim($var);
        $var = htmlspecialchars($var);
        $var = stripslashes($var);
        return $var;
    }
?>