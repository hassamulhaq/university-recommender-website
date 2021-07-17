<?php
    $id = $_GET['id'];
    require_once '../../../connection.php';

    $sql = "DELETE FROM program_university WHERE id = $id";
    $result = $conn->prepare($sql);
    $result->execute();
    if($result->rowCount() > 0){
        header("location:program_and_university.php?status=deleted");
    }
    else {
        echo '<h1>Data Not Deleted. ERROR <a href="manage_university.php">Back</a></h1>';
    }


