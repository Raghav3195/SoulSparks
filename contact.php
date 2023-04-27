<?php


ini_set("display_errors","1");
	error_reporting(E_ALL);
// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];



$conn = new mysqli('localhost','root','','contact');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("INSERT INTO `donation` (`name`, `email`, `subject`, `message`) VALUES (?, ?, ?, ?)");
		$stmt->bind_param("ssss", $name, $email, $subject, $message);
		$exeval = $stmt->execute();
		echo $exeval;
		echo "Question sent successfully...";
		header("Location: contact.html");
		exit();
		$stmt->close();
		$conn->close();
		
	}
?>
