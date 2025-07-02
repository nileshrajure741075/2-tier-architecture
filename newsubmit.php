<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$name = $_POST['name'];
$email = $_POST['email'];
$website = $_POST['website'];
$comment = $_POST['comment'];

$servername = "your-rds-endpoint";
$username = "admin";
$password = "YourPassword";
$dbname = "yourdbname";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO users (name, email, website, comment) VALUES ('$name', '$email', '$website', '$comment')";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
