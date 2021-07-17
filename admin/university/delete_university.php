<?php
$id = $_GET['id'];
require_once '../../connection.php';

$sql = "DELETE FROM universities WHERE university_id = $id";
$result = $conn->prepare($sql);
$result->execute();
if($result->rowCount() > 0){
    echo '<h1>University Deleted Successfully. <a href="manage_university.php">Back</a></h1>';
}
else {
    echo '<h1>University Not Deleted. ERROR <a href="manage_university.php">Back</a></h1>';
}


