<?php

require_once '../connection.php';
$user_id = $_GET['id']; //13

$sql = "UPDATE users set status = 'rejected' WHERE user_id = '$user_id' ";
$result = $conn->prepare($sql);
$result->execute();
if($result->rowCount() > 0 ){
    echo '<h1>User Request Rejected. <a href="user_request.php">Back</a></h1>';
}
else {
    echo '<h1>Error! <a href="user_request.php">Back</a></h1>';
}