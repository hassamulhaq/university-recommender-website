<?php


if (isset($_POST['submit'])) {
    require "../../connection.php";

    $university_name = $_POST['university_name'];
    $founded = $_POST['founded'];
    $website = $_POST['website'];
    $phone = $_POST['phone'];
    $location = $_POST['location'];
    $campus = $_POST['campus'];
    $hours = $_POST['hours'];
    $details = $_POST['details'];
    $details = $_POST['details'];


    $target_dir = '../../images/';
    $image = $_FILES['image']['name'];
    $target_dir .= $image;
    $tmp_dir = $_FILES['image']['tmp_name'];
    $size = $_FILES['image']['size'];
    $type = $_FILES['image']['type'];
    $ext = pathinfo($image, PATHINFO_EXTENSION);

    $uploaded = move_uploaded_file($tmp_dir, $target_dir);
    if ($uploaded) {
        $sql = "INSERT INTO universities (
            university_name, 
            founded,
            website,
            phone,
            location,
            campus,
            hours,
            details,
            image ) VALUES (
            '$university_name', 
            '$founded', 
            '$website', 
            '$phone', 
            '$location', 
            '$campus', 
            '$hours', 
            '$details',
            '$image'
        )";
        $fire = $conn->prepare($sql);
        if ($fire->execute()) {
            //echo 'added';
            header("location:add_university.php?status=success");
        }
        else {
            echo 'Data Not added, Error found. Please Back';
        }
    }
}