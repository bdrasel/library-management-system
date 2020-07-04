<?php 

	require_once('../config.php');


	if(isset($_GET['bookdelete'])){
		$id = base64_decode($_GET['bookdelete']);

		$delete = "DELETE FROM books WHERE id = '$id'";
		mysqli_query($con, $delete);
		header('Location: manage-book.php');
	}

	

?>