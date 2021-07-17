<?php
session_start();
require "connection.php";

if (isset($_POST['submit'])) {
        $user_id = $_SESSION['user_session']['user_id'];
        $inter_subject = $_POST['inter_subject'];
        $inter_percentage = $_POST['inter_percentage'];
        $interested_program = $_POST['interested_program'];
        $fee_start = $_POST['fee_start'];
        $fee_end = $_POST['fee_end'];
        $admission_date = $_POST['admission_date'];
        $season = $_POST['season'];

        $sql = "INSERT INTO search_list (
                user_id,
                inter_subject, 
                inter_percentage,
                interested_program,
                fee_start,
                fee_end,
                admission_date,
                season
                ) VALUES (
                '$user_id', 
                '$inter_subject', 
                '$inter_percentage',
                '$interested_program', 
                '$fee_start', 
                '$fee_end', 
                '$admission_date', 
                '$season'
                )";
        $fire = $conn->prepare($sql);
        if ($fire->execute()) {
            header('location:my_search_list.php?status=success');
        }
    } else {
        header('location:my_search_list.php?status=error');
}