<?php
session_start();

if (isset($_POST['submit'])) {
    require "connection.php";
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    if ($stmt->rowCount()>0) {
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result['status'] == 'pending') {
            header("location:index.php?status=pending");
        }
        if ($result['user_role'] == 'admin' && $result['status'] == 'approved') {
            $_SESSION['user_session'] = [
                'user_id'   => $result['user_id'],
                'username'  => $result['username'],
                'first_name'=> $result['first_name'],
                'last_name' => $result['last_name'],
                'email'     => $result['email'],
                'status'    => $result['status'],
                'user_role' => $result['user_role']
            ];
            header("location:admin/index.php?status=success");
        }
        elseif ($result['user_role'] == 'user' && $result['status'] == 'approved') {
            $_SESSION['user_session'] = [
                'user_id'   => $result['user_id'],
                'username'  => $result['username'],
                'first_name'=> $result['first_name'],
                'last_name' => $result['last_name'],
                'email'     => $result['email'],
                'status'    => $result['status'],
                'user_role' => $result['user_role']
            ];
            header("location:index.php?status=success");
        }
    }
    else {
        header("location:login.php?status=error");
    }
}