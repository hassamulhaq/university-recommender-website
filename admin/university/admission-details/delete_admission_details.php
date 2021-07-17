<?php
    $id = $_GET['id'];
    require_once '../../../connection.php';

    $sql = "DELETE FROM admission_details WHERE admission_id = $id";
    $result = $conn->prepare($sql);
    $result->execute();
    if($result->rowCount() > 0){
        header("location:admission_and_university.php?status=deleted");
    }
    else {
        echo '<h1>Data Not Deleted. ERROR <a href="admission_and_university.php">Back</a></h1>';
    }


