<?php
    session_start();

    if(!isset($_SESSION['email']))
    {
        ?>
            <script type="text/javascript">
                setTimeout("window.open('client_login.php', '_self');", 0);
            </script>
        <?php
    }
    else
    {
        $u_email = $_SESSION['email'];
        if(!empty($_FILES))
        {
            
            //database configuration
            $dbHost     = 'localhost';
            $dbUsername = 'id4438251_chirowa';
            $dbPassword = 'soen30010010';
            $dbName     = 'id4438251_chirowa';
            //connect with the database
            $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
            if($mysqli->connect_errno)
            {
                echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            }
            
            $targetDir = "prof_pics/";
            $fileName = $_FILES['file']['name'];
            $targetFile = $targetDir.$fileName;
            
            if(move_uploaded_file($_FILES['file']['tmp_name'],$targetFile))
            {
                //insert file information into db table
                $conn->query("update client_profile set bus_logo = '$fileName' where email like '$u_email'");
                header("refresh:0;my_account.php");
            }
            
        }
    }
    
    
?>