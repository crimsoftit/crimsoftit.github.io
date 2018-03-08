<?php

    session_start();

    include_once("connection.php");
    global $con;


    if(isset($_POST['username']))
    {
        $query = "
        select * from client_profile where email = '".$_POST["username"]."' and password = '".$_POST["password"]."'
        ";
        $result = mysqli_query($con, $query);
        if(mysqli_num_rows($result) > 0)
        {
            $_SESSION["email"] = $_POST["username"];
            echo 'Yes';
        }
        else
        {
            echo 'No';
        }
    }
?>