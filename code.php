<?php
session_start();
include 'includes/db_con.php';

if (isset($_POST['register_btn'])) {
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    
    // Check for empty values
    if ($fname === '' || $lname === '' || $email === '' || $password === '') {
        echo "<script>alert('All fields are required')</script>";
        exit;
    }
    $password_encrypt = password_hash($password, PASSWORD_DEFAULT);

    // Check email already exists
    $sql = "SELECT * FROM `users` WHERE email='$email'";
    $res = mysqli_query($conn, $sql);
    if (mysqli_num_rows($res) > 0) {
        echo "<script>alert('Email already registered')</script>";
        exit;
    }

    // Successful registration into users table
    $sql = "INSERT INTO `users` (firstName,lastName,email,password) VALUES('$fname','$lname','$email','$password_encrypt')";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        header('location: login.php');
    } else {
        echo "<script>alert('Something went wrong!')</script>";
        header('location: login.php');
    }

}

if (isset($_POST['login_btn'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Check for empty values
    if ($email === '' || $password === '') {
        echo "<script>alert('All fields are required to login!')</script>";
        exit;
    }

    // checking if email exists
    $sql = "SELECT * FROM `users` WHERE email='$email'";
    $res = mysqli_query($conn, $sql);
    if (mysqli_num_rows($res) > 0) {
        $user = mysqli_fetch_assoc($res);
        $hash = $user['password'];
        if (password_verify($password, $hash)) {
            // Login successful

            // session_regenerate_id(true);
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_logged_in'] = true;
            $_SESSION['user_name'] = $user['firstName'] . " " . $user['lastName'];
            $_SESSION['email'] = $user['email'];

            header('location: index.php');
            exit;
        } else {
            echo "<script>alert('Email or password incorrect')</script>";
        }
    } else {
        echo "<script>alert('Email or password incorrect')</script>";
    }
}

?>