    <?php require_once('header.php');?>

                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                            <li><a href="javascript:avoid(0)">Return Books</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-==-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">
                    <div class="col-sm-12">
                    <h4 class="section-subtitle"><b>Return Books</b></h4>
                    <div class="panel">
                        <div class="panel-content">
                            <div class="table-responsive">
                                <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Roll</th>
                                        <th>Phone</th>
                                        <th>Book Name</th>
                                        <th>Book Image</th>
                                        <th>Book Issue Date</th>
                                        <th>Return Book</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                        <?php 
                                            $result = "SELECT `issue_books`.`id`, `issue_books`.`book_id`,`issue_books`.`book_issue_date`,`students`.`fname`,`students`.`lname`,`students`.`roll`,`students`.`phone`,`books`.`book_name`,
`books`.`book_image` FROM `issue_books`
INNER JOIN `students` ON `students`.`id` = `issue_books`.`student_id`
INNER JOIN `books` ON `books`.`id` = `issue_books`.`book_id`
WHERE`issue_books`.`book_return_date` = ''";
                                            $query = mysqli_query($con, $result);

                                            while($row = mysqli_fetch_assoc($query)){

                                        ?>

                                        <tr>
                                            <td><?= $row['fname'] . ' ' . $row['lname']; ?></td>
                                            <td><?= $row['roll'];?></td>
                                            <td><?= $row['phone'];?></td>
                                            <td><?= $row['book_name'];?></td>
                                            <td>
                                                <img width="50px" src="../images/books/<?= $row['book_image'];?>" alt="">
                                            </td>
                                             <td><?= $row['book_issue_date'];?></td>
                                             <td><a href="return-book.php?id=<?= base64_encode($row['id'])?> &book_id=<?= $row['book_id']?>">Return Book</a></td>

                                             
                                            
                                        </tr>

                                        <?php 
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>        
          </div>
            <!-- RIGHT SIDEBAR -->

    <?php 

        if(isset($_GET['id'])){
           $id = base64_decode($_GET['id']);
           $book_id = $_GET['book_id'];
           $date = date('d-m-Y');
           $result = mysqli_query($con, "UPDATE `issue_books` SET `book_return_date`='$date' WHERE `id`='$id';");

           if($result){

                mysqli_query($con, "UPDATE `books` SET `available_qty`= `available_qty`+1  WHERE `id` ='$book_id'");

            ?>
                <script>
                    alert("Book Return Successfully");
                    javascript:history.go(-1);
                </script>  
                
            <?php
           }else{
            ?>
             <script>
                alert("Something Wrong");
            </script> 

            <?php

           }
        }

    ?>            

<?php require_once('footer.php');?>       