<?php
ini_set("display_errors","1");
	error_reporting(E_ALL);
// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$msg = $_POST['msg'];

$conn = new mysqli('localhost','root','','contact');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("INSERT INTO `volunteer` (`name`, `email`, `msg`) VALUES (?, ?, ?)");
		$stmt->bind_param("sss", $name, $email, $msg);
		$exeval = $stmt->execute();
		echo $exeval;
		// echo "Message Sent.....";
		header("Location: volunteer.html");
		exit();
		$stmt->close();
		$conn->close();
		
	}
?>
