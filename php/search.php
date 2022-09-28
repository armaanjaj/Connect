<?php
    session_start();
    include_once "config.php";

    $outgoing_id = $_SESSION['unique_id'];

    $search_item = mysqli_real_escape_string($con, $_POST['search_item']);

    $output = "";
    $sql = mysqli_query($con, "SELECT * FROM users WHERE (f_name LIKE '%{$search_item}%' OR l_name LIKE '%{$search_item}%') AND (NOT unique_id = {$outgoing_id})");
    if(mysqli_num_rows($sql) > 0){
        include "data.php";
    }
    else{
        $output .= "No users found";
    }

    echo $output;
?>