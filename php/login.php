<?php
    session_start();
    include_once "config.php";

    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    if(!empty($email) && !empty($password)){
        $sql = mysqli_query($con, "SELECT * FROM users WHERE email = '{$email}' && password = '{$password}'");
        if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
            $_SESSION['unique_id'] = $row['unique_id'];
            echo "success";
        }
        else{
            echo "Invalid login credentials.";
        }
    }
    else{
        echo "All fields are required!";
    }
?>