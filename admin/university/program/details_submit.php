<?php


if (isset($_POST['submit'])) {
    require "../../../connection.php";

    $program_name = $_POST['program_name'];

    $university_id = $_POST['university_id'];
    $program_id = $_POST['program_id'];
    $duration = $_POST['duration'];
    $fee = $_POST['fee'];

    $sql = "INSERT INTO program_university (university_id, program_id, duration, fee) VALUES ('$university_id', '$program_id', '$duration', '$fee')";
    $fire = $conn->prepare($sql);
    if ($fire->execute()) {
        echo 'added';
        header("location:add_program.php?status=success");
    }
    else {
        echo 'Data Not added, Error found. Please Back';
    }
}