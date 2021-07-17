<?php

    session_start();

    $user_id = $_POST['user_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $gender = $_POST['gender'];
    $date_of_birth = $_POST['date_of_birth'];
    $cnic = $_POST['cnic'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $university_name = $_POST['university_name'];
    $study_program = $_POST['study_program'];
    $current_semester = $_POST['current_semester'];
    $password = $_POST['password'];

    require_once 'connection.php';


    $sql = "UPDATE users_table SET 
        first_name = '$first_name',
        last_name = '$last_name',
        gender = '$gender',
        date_of_birth = '$date_of_birth',
        cnic = '$cnic',
        address = '$address',
        email = '$email',
        phone = '$phone',
        university_name = '$university_name',
        study_program = '$study_program',
        current_semester = '$current_semester',
        password = '$password'
        WHERE user_id = $user_id";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    if ($stmt->rowCount() > 0 ) {
        exit('<h1>Update successful. <a href="index.php">Back</a></h1>');
    }
    else {
        exit('System Error');
    }
