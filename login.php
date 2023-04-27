<?php

// Connect to the MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "contact";



session_start();
$email = $_POST['email'];
$password = $_POST['password'];
if(ISSET($_POST['submit'])){
    $conn = new mysqli("localhost", "root", "", "contact");
    $query = $conn->query("SELECT *FROM `sign` WHERE `email` = '$email' && `password` = '$password'");
    $fetch = $query->fetch_array();
    $valid = $query->num_rows;
        if($valid > 0){
            $_SESSION['admin_id'] = $fetch['admin_id'];
            header("location:index.html");
            exit();
        }else{
            echo "<script>alert('Invalid username or password')</script>";
            echo "<script>window.location = 'login.html'</script>";
        }
    $conn->close();
}

?>