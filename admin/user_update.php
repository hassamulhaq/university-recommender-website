<?php


if (isset($_POST['submit'])) {
    require "../connection.php";

    $user_id = $_POST['user_id'];
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

    $target_dir = '../images/';
    $profileImage = $_FILES['profile_image']['name'];
    $target_dir .= $profileImage;
    $tmp_dir = $_FILES['profile_image']['tmp_name'];
    $size = $_FILES['profile_image']['size'];
    $type = $_FILES['profile_image']['type'];
    $ext = pathinfo($profileImage, PATHINFO_EXTENSION);

    $uploaded = move_uploaded_file($tmp_dir, $target_dir);
    if ($uploaded) {
        $sql = "UPDATE users SET username = '$username',
        first_name = '$first_name',
        last_name = '$last_name', 
        gender = '$gender', 
        date_of_birth = '$date_of_birth', 
        cnic = '$cnic',
        profile_image = '$target_dir',
        address = '$address',
        email = '$email',
        phone = '$phone',
        university_name = '$university_name',
        study_program = '$study_program',
        current_semester = '$current_semester',
        password = '$password' WHERE user_id = $user_id";
        $fire = $conn->prepare($sql);
        if ($fire->execute()) {
            header("location:user_manage.php?status=updated");
        }
        else {
            echo 'Data Not Updated, Error found';
        }
    }


}