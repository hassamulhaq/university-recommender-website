<?php session_start();
if (isset($_POST['submit'])) {
    $target_dir = '../include_files/image/';
    $profileImage = $_FILES['profileImage']['name'];
    $target_dir .= $profileImage;
    $tmp_dir = $_FILES['profileImage']['tmp_name'];
    $size = $_FILES['profileImage']['size'];
    $type = $_FILES['profileImage']['type'];
    $ext = pathinfo($profileImage, PATHINFO_EXTENSION);     


    $user_id = $_POST['user_id'];

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $gender = $_POST['gender'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    #join Date set by php function date()
    $join_date = date('Y-m-d');


    if ($password !== $confirmPassword) {
        exit('Password and Confirm Password Do not Matched');
    }


    if ($size > 999999) { //999999 = 1MB
        exit('Image file size is must be 1 MB');
    }

    if ($ext == 'png' or $ext == 'jpg' or $ext == 'jpeg' or $ext == 'PNG' or $ext == 'JPG' or $ext == 'JPEG') {
        require_once '../database_connection.php';
        $uploaded = move_uploaded_file($tmp_dir, $target_dir);
        if ($uploaded) {

            $sql = "UPDATE tbl_user SET first_name='$firstName', last_name='$lastName', phone='$phone', email='$email', profile_image='$target_dir', gender='$gender', password='$password' WHERE user_id=$user_id";
            $result = $conn->exec($sql);
            if ($result) {
                exit('<h1>Update successful. <a href="profile.php">Back Profile</a></h1>');
            }
            else {
                exit('System Error');
            }
        }
    }
    else {
        exit('<h1>Invalid File, Upload only image (Png, Jpeg)</h1>');
    }
}
else {
    echo "error";
}