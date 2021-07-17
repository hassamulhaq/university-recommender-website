<?php


if (isset($_POST['submit'])) {
    require "../../../connection.php";

    $university_id = $_POST['university_id'];
    $program_id = $_POST['program_id'];
    $merit = $_POST['merit'];
    $duration = $_POST['duration'];
    $fee = $_POST['fee'];
    $best_for = $_POST['best_for'];
    $program_link = $_POST['program_link'];
    $details = $_POST['details'];

    $first_sql = "SELECT university_id, program_id FROM program_university 
                    WHERE university_id ='$university_id' AND program_id ='$program_id' ";
    $first_fire = $conn->prepare($first_sql);
    $first_fire->execute();

    if ($first_fire->rowCount() == 1) {
        header("location:program_and_university.php?status=already_exists");
    } else {
        $sql = "INSERT INTO program_university (university_id, program_id, merit, duration, fee, best_for, program_link, details) VALUES ('$university_id', '$program_id', '$merit', '$duration', '$fee', '$best_for', '$program_link', '$details' )";
        $fire = $conn->prepare($sql);
        if ($fire->execute()) {
            echo 'added';
            header("location:program_and_university.php?status=success");
        }
        else {
            echo 'Data Not added, Error found. Please Back';
        }
    }



}