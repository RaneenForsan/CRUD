<?php 
$conn = new mysqli('localhost', 'root', '', 'services');
if ($conn->connect_error) {
	die("Connection error: " . $conn->connect_error);
}
$result = $conn->query("SELECT Title FROM form_data");
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		echo $row['Title'] . '<br>';
	}
}
?>
