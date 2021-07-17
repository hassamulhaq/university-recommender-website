<?php
    $user_id = $_GET['id'];
    require_once '../connection.php';

    $sql = "DELETE FROM users WHERE user_id = $user_id";
    $result = $conn->prepare($sql);
    $result->execute();
    if($result->rowCount() > 0){
        echo '<h1>User Deleted Successfully. <a href="user_manage.php">Back</a></h1>';
    }
    else {
        echo '<h1>User Not Deleted. <a href="user_manage.php">Back</a></h1>';
    }


