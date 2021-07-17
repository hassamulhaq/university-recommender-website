<?php

    require_once '../connection.php';
    $user_id = $_GET['id'];

    $sql = "UPDATE users SET status = 'approved' WHERE user_id = '$user_id' ";
    $result = $conn->prepare($sql);
    $result->execute();
    if($result->rowCount() > 0 ){
        echo '<h1>User Request Approved. <a href="user_request.php">Back</a></h1>';
    }
    else {
        echo '<h1>Error! <a href="user_request.php">Back</a></h1>';
    }


