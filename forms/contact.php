<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jaysonandazel";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$name = $_POST['name'];
$mobile_number = $_POST['mobile_number'];
$message = $_POST['message'];
//handler

$sql = "SELECT mobile_number FROM attendees WHERE mobile_number = $mobile_number";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo $response = 'Mobile number is already registered.';
  return;
}

$sql = "INSERT INTO attendees (name, mobile_number, message)
VALUES ('$name', '$mobile_number', '$message')";

$response = new stdClass();
if ($conn->query($sql) === TRUE) {
  $response = 'OK';
}

$conn->close();

echo $response;
?>
