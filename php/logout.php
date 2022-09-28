<?php
    session_start();
    if(isset($_SESSION['unique_id'])){ // Only show this page if user is logged in outherwise redirect to login page
        include_once "config.php";
        $logout_id = mysqli_real_escape_string($con, $_GET['logout_id']);
        
        if(isset($logout_id)){
            $status = "Offline now";
            // update the status once user clicks logout
            $sql = mysqli_query($con, "UPDATE users SET status = '{$status}' WHERE unique_id={$_GET['logout_id']}");
            
            if($sql){
                session_unset();
                session_destroy();
                header("location: ../login.php");
            }
        }
        else{
            header("location: ../users.php");
        }
    }
    else{  
        header("location: ../login.php");
    }
?>