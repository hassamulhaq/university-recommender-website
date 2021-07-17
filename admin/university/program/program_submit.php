<?php


if (isset($_POST['submit'])) {
    require "../../../connection.php";

    $program_name = $_POST['program_name'];

    $sql = "INSERT INTO programs (program_name ) VALUES ('$program_name')";
    $fire = $conn->prepare($sql);
    if ($fire->execute()) {
        echo 'added';
        header("location:add_program.php?status=success");
    }
    else {
        echo 'Data Not added, Error found. Please Back';
    }
}