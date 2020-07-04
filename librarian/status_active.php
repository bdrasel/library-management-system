<?php 
	
	require_once('../config.php');

	$id = base64_decode($_GET['id']);
	
	$update = "UPDATE students SET status = 1 WHERE id = '$id'";
	$result = mysqli_query($con, $update);
	header('Location: students.php');



?>