<?php


if (isset($_POST['submit'])) {
    require "../../../connection.php";

    $university_id = $_POST['university_id'];
    $season = $_POST['season'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $details = $_POST['details'];

    $sql = "INSERT INTO admission_details (university_id, season, start_date, end_date, details) VALUES ('$university_id', '$season', '$start_date', '$end_date', '$details' )";
    $fire = $conn->prepare($sql);
    if ($fire->execute()) {
        echo 'added';
        header("location:admission_and_university.php?status=success");
    }
    else {
        echo 'Data Not added, Error found. Please Back';
    }
}