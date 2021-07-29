<?php
    require 'globals.php';

    $id = $_GET['id'];

    open_connection();

    if($conn)
    {
        $sql = "delete from warehouse where id='$id'";

        if($result = $conn->query($sql))
        {
            setcookie('delete_item', $title, time() + 3);
            header('location: http://localhost/manage.php');
        }


    }

    close_connection();

?>