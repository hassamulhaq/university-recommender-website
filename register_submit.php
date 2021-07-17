<?php


if (isset($_POST['submit'])) {
    require "connection.php";

    $username = $_POST['first_name'].'-'.$_POST['last_name'];
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

    $target_dir = 'images/';
    $profileImage = $_FILES['profile_image']['name'];
    $target_dir .= $profileImage;
    $tmp_dir = $_FILES['profile_image']['tmp_name'];
    $size = $_FILES['profile_image']['size'];
    $type = $_FILES['profile_image']['type'];
    $ext = pathinfo($profileImage, PATHINFO_EXTENSION);

    $uploaded = move_uploaded_file($tmp_dir, $target_dir);
    if ($uploaded) {
        $sql = "INSERT INTO users (username, 
        first_name,
        last_name,
        gender,
        date_of_birth,
        cnic,
        profile_image,
        address,
        email,
        phone,
        university_name,
        study_program,
        current_semester,
        password) VALUES (
        '$username', 
        '$e', 
        '$last_namfirst_name', 
        '$gender', 
        '$date_of_birth', 
        '$cnic',
        '$target_dir',
        '$address',
        '$email',
        '$phone',
        '$university_name',
        '$study_program',
        '$current_semester',
        '$password'
        )";
        $fire = $conn->prepare($sql);
        if ($fire->execute()) {
            header("location:register.php?success");
        }
        else {
            echo 'Data Not added, Error found';
        }
    }


}
?>