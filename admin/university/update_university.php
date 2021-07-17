<?php


if (isset($_POST['submit'])) {
    require "../../connection.php";

    $university_id = $_POST['university_id'];

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
        $sql = "UPDATE universities SET 
            university_name = '$university_name',
            founded = '$founded',
            website = '$website',
            phone = '$phone',
            location = '$location',
            campus = '$campus',
            hours = '$hours',
            details = '$details',
            image = '$image' WHERE university_id = '$university_id'";
        $fire = $conn->prepare($sql);
        if ($fire->execute()) {

            header("location:manage_university.php?status=updated");
        }
        else {
            echo 'Data Not added, Error found. Please Back';
        }
    }
}