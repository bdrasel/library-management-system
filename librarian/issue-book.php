<?php 
  require_once('header.php');

	 if(isset($_POST['issue_book'])){

	 	$student_id = $_POST['student_id'];
	 	$book_id= $_POST['book_id'];
	 	$book_issue_date = $_POST['book_issue_date'];


	 	$insert = "INSERT INTO issue_books(student_id,book_id,book_issue_date)VALUES('$student_id','$book_id','$book_issue_date')";
	 	$query = mysqli_query($con, $insert);



		 	if($query){

		 		mysqli_query($con, "UPDATE `books` SET `available_qty`= `available_qty`-1  WHERE `id` ='$book_id'");

		 		?>

				<script>
	              alert('Book Issue Successfully!');

				</script>

		 		<?php 
		 	}else{
		 		?>

				<script>
					 alert("Book Issue Faield");
					
				</script>

		 		<?php 
			 }

	 }
?>

<div class="content-header">
	<div class="leftside-content-header">
		<ul class="breadcrumbs">
			<li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
			<li><a href="#">Issue Book</a></li>
		</ul>
	</div>
</div>
<div class="row animated fadeInUp">
	<div class="col-sm-6 col-sm-offset-3">
		<div class="panel">
			<div class="panel-content">
				<div class="row">
					<div class="col-md-12">
						<form class="form-inline" method="post">
							<div class="form-group">

								
							<select class="form-control" name="student_id">
								<option value="">Select</option>
								<?php 
                                $result = "SELECT * FROM students WHERE status = 1";
                                $query = mysqli_query($con, $result);

                                while($row = mysqli_fetch_assoc($query)){ ?>
                                	<option value="<?= $row['id'];?>"><?= ucwords($row['fname'] . ' ' . $row['lname']). ' - (' . $row['roll']. ' )' ?></option>

                                <?php  }  ?>
								
							</select>

							</div>
							<div class="form-group">
								<button type="submit" name="serach" class="btn btn-primary">Search</button>
							</div>
						</form>
					</div>
				</div>
				<?php 
					if(isset($_POST['serach'])){
						$id = $_POST['student_id'];
						
						$result = "SELECT * FROM students WHERE id = '$id'";
                         $query = mysqli_query($con, $result);
                         $row = mysqli_fetch_assoc($query); ?>
							
							<div class="panel">
		                        <div class="panel-content">
		                            <div class="row">
		                                <div class="col-md-12">
		                                    <form method="post" action="">            
		                                        <div class="form-group">
		                                            <label for="name">Student Name</label>
		                                            <input type="text" class="form-control" readonly id="name" value="<?= $row['fname'] . ' ' . $row['lname'] ?>">
		                                            <input type="hidden" value="<?= $row['id'];?>" name="student_id">
		                                        </div>
		                                        <div class="form-group">
		                                        	<label for="sudent_id">Book Name</label>
		                                           <select class="form-control" name="book_id" id="book_id">
														<option value="">Select</option>
														<?php 
						                                $result = "SELECT * FROM books WHERE available_qty > 0";
						                                $query = mysqli_query($con, $result);

						                                while($row = mysqli_fetch_assoc($query)){ ?>
						                                	<option value="<?= $row['id'];?>"> <?= $row['book_name'];?>   </option>

						                                <?php  }  ?>
														
													</select>
		                                        </div>
		                                        <div class="form-group">
		                                        	<label for="date">Book Issue Date</label>
		                                        	<input type="text" class="form-control" name="book_issue_date" readonly id="date" value="<?= date('d-m-Y');?>">
		                                        </div>
		                                        <div class="form-group">
		                                            <button type="submit" class="btn btn-primary" name="issue_book">Save Issue Book</button>
		                                        </div>
		                                    </form>
		                                </div>
		                            </div>
		                        </div>
		                    </div>

                     <?php  } ?>
			</div>
		</div>
	</div>
	
</div>
          
<?php require_once('footer.php');?>       