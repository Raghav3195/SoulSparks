<?php
ini_set("display_errors","1");
	error_reporting(E_ALL);
// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$conn = new mysqli('localhost','root','','contact');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("INSERT INTO `sign` (`name`, `email`, `password`) VALUES (?, ?, ?)");
		$stmt->bind_param("sss", $name, $email, $password);
		$exeval = $stmt->execute();
		echo $exeval;
		header('Location: login.html');
		exit();
		$stmt->close();
		$conn->close();
	}
?>