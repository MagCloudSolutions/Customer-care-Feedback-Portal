<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "connection.php";
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * from user where username = '$username'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    if ($result) {
        if ($num > 0) {
            if ($password != $row['password']) {
                echo "<script>alert('password incorrect')</script>";

            } else {
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                header('Location: home.php');
            }
        } else {
            echo "<script>alert('UserName Not Found')</script>";
        }
    } else {
        echo "<script>alert('connection Error')</script>";
    }
}

?>