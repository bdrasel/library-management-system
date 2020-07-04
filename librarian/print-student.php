<?php 
	require_once('../config.php');
	$result = mysqli_query($con, "SELECT * FROM `students`");

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Print Student</title>
	<style>
		body{
			margin:0;
			font-family: kalpurush;
			padding:0;
		}
		.prit-area{
			width:800px;
			height: 1130px;
			margin:auto;
			box-sizing: border-box;
			page-break-after: always;
		}
		.header, .page-info{
			text-align: center;
		}
		.data-info{}
		.data-info table{
			width:100%;
			border:collapse;

		}
		.data-info table th{
			border:1px solid #555;
			padding:4px;
			line-height: 1em;

		}
		.data-info table td{
			border:1px solid #555;
			padding:4px;
			line-height: 1em;
		}

	</style>
</head>
<body onload="window.print()">
			<?php 

				$s1 = 1;
				$page = 1;
				$total  = mysqli_num_rows($result);
				$per_page = 3;
				while($row = mysqli_fetch_assoc($result)){
					if($s1 % $per_page == 1){
						echo page_header();
					}

				 ?>
					<tr>
						<td><?= $s1++; ?></td>
						<td><?= $row['fname'];?> <?= $row['lname'];?></td>
						<td><?= $row['id'];?></td>
						<td><?= $row['roll'];?></td>
						<td><?= $row['reg'];?></td>
						<td><?= $row['email'];?></td>
						<td><?= $row['username'];?></td>
						<td><?= $row['phone'];?></td>
						
					</tr>



				<?php 

					if($s1 % $per_page == 0 || $total == $per_page){
						echo page_footer($page++);
					}

				} ?>

				
			
			
		</div>
	</div>
</body>
</html>


<?php 

	function page_header(){
		$data ='
			
				<div class="prit-area">
		<div class="header">
			<h3>bdraseltech.com</h3>
			<h3>bdraseltech@gmail.com</h3>
		</div>
		<div class="data-info">
			<table>
				<tr>
					<th>S1 No</th>
					<th>Name</th>
					<th>Student Id</th>
					<th>Roll</th>
					<th>Reg</th>
					<th>Email</th>
					<th>Username</th>
					<th>Phone</th>
				</tr>

		 ';
		return $data;
	}

	function page_footer($page){

		$data = '
			</table>
			<div class="page-info">Page :- '.$page.'  </div>

		 ';
		return $data;
	}


?>