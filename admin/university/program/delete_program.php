<?php

    require "../../../connection.php";
    $id = $_GET['id'];


    $sql = "DELETE FROM programs WHERE program_id='$id' ";
    $stmt = $conn->prepare($sql);
    $fire = $stmt->execute();
    if ($fire)
    {
        //echo 'deleted';
        header("location:add_program.php?status=deleted");
    } else {
        header("location:add_program.php?status=error");
    }
